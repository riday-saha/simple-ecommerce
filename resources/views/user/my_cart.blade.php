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
                <h2 class="text-center my-5">SHOPPING CART</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="cart-table">
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                          
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
                                {{-- <td style="vertical-align: middle">{{$cart_products->Production->price}}</td> --}}
                                <td style="vertical-align: middle"><a href="{{route('remove.cart',$cart_products->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-total">
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
                            <tr>
                                {{-- <td colspan="2" style="background:#0045C8; cursor:pointer"><a href="" class="btn btn-primary" style="color:gold">Make Order</a></td> --}}
                                <td colspan="2"><a href="{{route('make.order')}}" class="btn btn-success">PROCEED TO CHECKOUT</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

