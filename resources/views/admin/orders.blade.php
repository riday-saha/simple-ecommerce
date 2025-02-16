@extends('admin.admintemplate')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cart-table p-4" style="border: 1px solid gray">
                    <h5 class="mb-3 text-center">Your Orders</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                            <thead>
                                <tr>
                                    <th>Cutomer Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Pro Image</th>
                                    <th>Pro Title</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                </tr>
                            </thead>
                          
                          <tbody>
                            @php 
                                $total = 0; 
                            @endphp

                            @foreach ($getting_order as $cart_products)
                            <tr>
                                <td style="vertical-align: middle">{{$cart_products->User->name}}</td>
                                <td style="vertical-align: middle">{{$cart_products->rec_address}}</td>
                                <td style="vertical-align: middle">{{$cart_products->phone}}</td>
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

                                <td style="vertical-align: middle">
                                    <a href="{{route('onway.status',$cart_products->id)}}" class="btn btn-danger btn-sm">On the Way</a>
                                    <a href="{{route('deliverd.status',$cart_products->id)}}" class="btn btn-success btn-sm">Delivered</a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection