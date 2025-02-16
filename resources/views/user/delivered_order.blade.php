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
            <div class="col-12">
                <div class="cart-table my-5" style="border: 1px solid gray">
                    <h5 class="my-3 text-center">Delivered Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
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
                                <td style="vertical-align: middle">{{$cart_products->status}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total</td>
                                <td colspan="2">{{$total + 50}} [Shipping Charge(50) Included]</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    @php
                        $deliver_data = collect($cart_product)->where('status','delivered')->count();
                    @endphp

                    @if ($deliver_data == 0)
                    <p class="text-center text-danger">No Data Found!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection