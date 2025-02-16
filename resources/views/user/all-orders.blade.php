@extends('user.usertemplate')

@section('slider')
<section class="slider_section position-relative">
  <div class="slider_bg_box">
    <img src="images/slider-bg.jpg" alt="">
  </div>
  <div class="slider_bg"></div>
  <div class="container">
    <div class="col-md-9 col-lg-8">
      <div class="detail-box">
        <h1>
          Best Jewellery
          <br> Collection
        </h1>
        <p class="mt-4">
          It is a long established fact that a reader will be distracted by the readable content of a page when
          looking at its layout. The point of using Lorem
        </p>
      </div>
    </div>
  </div>
</section>
@endsection

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="order-info py-5">
                    <h5 class="text-center">Order Information</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary table-striped text-dark">
                          
                          <tbody>
                            @php
                                $deliver_data = collect($curnt_user)->count();
                            @endphp
                            @if ($deliver_data == 0)
                                <p class="text-danger">Make an Order</p>
                            @else
                            <tr>
                                <td style="padding-left: 50px">Name:{{$curnt_user->User->name}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Order Status: {{$curnt_user->status}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Payment By: Cash On Delivery</td>
                            </tr>
                            @endif
                            
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shipping-details py-5">
                    <h5 class="text-center">Shipping Details</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary table-striped text-dark">
                          
                          <tbody class="">
                            @if ($deliver_data == 0)
                            <p class="text-danger">Make an Order</p>
                            @else
                            <tr>
                                <td style="padding-left: 50px">Order Date:{{$curnt_user->created_at->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Name:{{$curnt_user->User->name}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Phone: {{$curnt_user->phone}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Email: {{$curnt_user->User->email}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 50px">Address: {{$curnt_user->rec_address}}</td>
                            </tr>
                            @endif
                            
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="cart-table p-4" style="border: 1px solid gray">
                    <h5 class="mb-3 text-center">Your Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                          
                          <tbody>
                            @php 
                                $total = 0; 
                            @endphp

                            @foreach ($cart_product as $cart_products)
                            <tr>
                                <td><img src="{{asset($cart_products->Production->pro_image)}}" alt="img" style="height: 80px;width:50px"></td>
                                <td style="vertical-align: middle">{{$cart_products->Production->pro_name}}</td>

                                @if ($cart_products->Production->discout_percentage)
                                    @php
                                        $get_discount = $cart_products->Production->discout_percentage/100;
                                        $calco_dis = $cart_products->Production->price -($cart_products->Production->price*$get_discount);
                                        $total += $calco_dis; // Add discounted price to total
                                    @endphp
                                    <td style="vertical-align: middle">{{$calco_dis}}(Got Disc)</td>
                                @else
                                    @php
                                        $total += $cart_products->Production->price; // Add normal price to total
                                    @endphp
                                <td style="vertical-align: middle">{{$cart_products->Production->price}}</td>
                                @endif
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="cart-total  my-5 p-4" style="border: 1px solid gray">
                    <h5 class="mb-3">Payment Information</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary text-center text-dark">
                          
                          <tbody>
                            <tr>
                                <td>
                                    SUB TOTAL
                                </td>
                                <td>{{$total}}</td>
                            </tr>
                            <tr>
                                <td>SHIPPING FEE</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>TOTAL</td>
                                <td>{{$total+50}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection