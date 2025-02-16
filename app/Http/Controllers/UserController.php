<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   

    public function user_dashboard(){
        $show_latestproduct =  Product::orderBy('id', 'desc')->get();
        $get_tenpercent = Product::where('discout_percentage',10)->orderBy('id','desc')->first();
        $get_fifteenpercent = Product::where('discout_percentage',15)->orderBy('id','desc')->first();
        $get_twentypercent = Product::where('discout_percentage',20)->orderBy('id','desc')->first();

        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->count();
        return view('user.home',compact('show_latestproduct','count','get_tenpercent','get_fifteenpercent','get_twentypercent'));
    }

    public function home(){
        $show_latestproduct =  Product::orderBy('id', 'desc')->get();
        $get_tenpercent = Product::where('discout_percentage',10)->orderBy('id','desc')->first();
        $get_fifteenpercent = Product::where('discout_percentage',15)->orderBy('id','desc')->first();
        $get_twentypercent = Product::where('discout_percentage',20)->orderBy('id','desc')->first();

        if(Auth::user()){
            $user = Auth::user()->id;
            $count = Cart::where('user_id',$user)->count();
        }else{
            $count = '';
        }

        return view('user.home',compact('show_latestproduct','count','get_tenpercent','get_fifteenpercent','get_twentypercent'));
    }

    public function shop_all(){
        $show_latestproduct =  Product::all();

        if(Auth::user()){
            $user = Auth::user()->id;
            $count = Cart::where('user_id',$user)->count();
        }else{
            $count = '';
        }
        return view('user.shop',compact('count','show_latestproduct'));
    }

    //add the product to the cart
    public function add_cart(Request $request, $id){
        $get_proId = $id;
        $get_userId = Auth::user()->id;

        Cart::create([
            'user_id' => $get_userId,
            'product_id' => $get_proId
        ]);

        return redirect()->back()->with('success', 'Product Added to the Cart Successfully');
    }

    //show selected product to the my cart
    public function my_cart(Request $request){

        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->count();

        $cart_product = Cart::with('Production')->get();

        return view('user.my_cart',compact('count','cart_product'));
    }

    //remove product from the cart table
    public function remove_cart(Request $request, $id){
        $remove_id = Cart::find($id);
        $remove_id->delete();
        return redirect()->back()->with('success', 'Cart Updated');
    }

    //make order page
    public function make_order(Request $request){
        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->count();

        $cart_product = Cart::with('Production')->get();

        return view('user.order',compact('count','cart_product'));
    }

    //confirm the order by clicking place order
    public function confirm_order(Request $request){
        
        $reciver_address = $request->address;
        $reciver_phone = $request->phone;
        $reciver = Cart::where('user_id',Auth::user()->id)->get();
        
        //store data to the order table
        foreach($reciver as $recivers){
            Order::create([
                'rec_address' => $reciver_address,
                'phone' => $reciver_phone,
                'users_id' => Auth::user()->id,
                'products_id' => $recivers->product_id
            ]);
        }

        //now delete data from cart table
        $cart_remove = Cart::where('user_id',Auth::user()->id)->get();
        foreach($cart_remove as $cart_removes){

            $data_delete = Cart::find($cart_removes->id);
            $data_delete->delete();
        }

        return redirect()->route('all.orders');
    }

    public function all_orders(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->count();

        $curnt_user = Order::with('Production','User')->where('users_id',Auth::user()->id)->where('status','In Progress') ->orderBy('created_at', 'desc')->first(); // Gets the most recent record;
        $cart_product = Order::with('Production')->where('users_id',$user)->where('status','In Progress')->get();
        
        return view('user.all-orders',compact('curnt_user','cart_product','count'));
    }

    public function delivered_orders(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->count();
        $cart_product = Order::with('Production')->where('users_id',$user)->where('status','delivered')->get();

        return view('user.delivered_order',compact('count','cart_product'));
    }
}
