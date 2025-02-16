<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function admin_index(){
        $total_users = User::where('user_type','user')->count();
        $total_products = Product::count();
        $completed_order = Order::where('status','delivered')->count();
        $pending_order = Order::where('status','In Progress')->count();
        return view('admin.dashboard',compact('total_users','total_products','completed_order','pending_order'));
    }

    public function  pro_category(){
        $all_category = Category::paginate();
        return view('admin.category',compact('all_category'));
    }

    public function insert_category(Request $request){
        $request->validate([
            'get_cat' => 'required|string|unique:categories,cat_name'
        ],[
            'get_cat.required' => 'Please Give a Category Name'
        ]);

        Category::create([
            'cat_name' => $request->get_cat
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $request->validate([
            'up_catgoe' => 'required|string|unique:categories,cat_name'
        ],[
            'up_catgoe.required' => 'Please Give a Category Name'
        ]);

        $find_uid = Category::find($request->up_catgoe_id);
        $find_uid->cat_name = $request->up_catgoe;
        $find_uid->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function delete_category(Request $request){
        $find_catid = Category::find($request->get_id);

        $find_catid->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function all_product(){
        $geting_cat = Category::all();
        $all_products = Product::with('category')->get();
        return view('admin.product',compact('geting_cat','all_products'));
    }

    public function add_product(Request $request){
        $request->validate([
            'pro_names' => 'required|string|max:225',
            'pro_price' => 'required|numeric|min:0',
            'pro_discount' => 'nullable|numeric|min:0|max:100',
            'pro_img' => 'required|mimetypes:image/jpg,image/png,image/jpeg',
            'pro_catego' => 'required|numeric',
        ],[
            'pro_names.required' => 'Please Give a Product Name',
            'pro_price.required' => 'Please Give a Product Name',
            'pro_img.required' => 'Select an Image for the Product',
            'pro_img.mimetypes' => 'Image type must be jpg,png or jpeg',
            'pro_catego.required' => 'Please Select a Category',
            'pro_catego.numeric' => 'Please Select a Category'
        ]);

        $img_name = time().'.'.$request->pro_img->extension();
        $request->pro_img->move(public_path('products'),$img_name);

        Product::create([
            'pro_name' => $request->pro_names,
            'price' => $request->pro_price,
            'discout_percentage' => $request->pro_discount,
            'pro_image' => 'products/'.$img_name,
            'category_id' => $request->pro_catego
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function update_product(Request $request){

        $request->validate([
            'uppro_img' => 'image|mimes:jpeg,png,jpg'
        ]);

        $find_id = Product::find($request->uppro_id);

        if($request->hasFile('uppro_img')){
            //delete previous file
            if(File::exists(public_path($find_id->pro_image))){
                File::delete(public_path($find_id->pro_image));
            }
            //store new image
            $new_upimg = time().'.'.$request->uppro_img->extension();
            $request->uppro_img->move(public_path('products'),$new_upimg);

            $find_id->pro_image = 'products/'.$new_upimg;
        }

        $find_id->pro_name = $request->uppro_names;
        $find_id->price = $request->uppro_price;
        $find_id->discout_percentage = $request->uppro_discount;
        $find_id->category_id = $request->uppro_catego;
        $find_id->save();
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function delete_product(Request $request){
        $dlt_proid = Product::find($request->pro_did);

        if($dlt_proid->pro_image){
            $get_link = public_path($dlt_proid->pro_image);
            unlink($get_link);
        }
        $dlt_proid->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function get_order(){
        $getting_order = Order::with('Production','User')->get();
        return view('admin.orders',compact('getting_order'));
    }

    public function delivered_status($id){
        $got_dsid = Order::find($id);
        $got_dsid->update([
            'status' => 'delivered'
        ]);

        return redirect()->back()->with('success', 'Status Changed to Delivered');
    }

    public function on_way($id){
        $got_dsid = Order::find($id);
        $got_dsid->update([
            'status' => 'On the Way'
        ]);

        return redirect()->back()->with('success', 'Status Changed to On the Way');
    }
}
