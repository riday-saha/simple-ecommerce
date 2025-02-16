@extends('user.usertemplate')

@section('contents')
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
        </h2>
      </div>
      <div class="row">
        @foreach ($show_latestproduct as $show_latestproducts)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
              
                <div class="img-box">
                  <img src="{{asset($show_latestproducts->pro_image)}}" alt="" class="zoom" data-magnify-src="{{asset($show_latestproducts->pro_image)}}">
                </div>
                <div class="detail-box">
                  <h6>
                    {{$show_latestproducts->pro_name}}
                  </h6>
                  <h6>
                    Price
                    <span>
                    {{$show_latestproducts->price}}
                    </span>
                  </h6>
                </div>
                @if ($show_latestproducts->discout_percentage)
                <div class="new">
                    <span>
                      {{$show_latestproducts->discout_percentage}}% off
                    </span>
                </div>
                @endif
              
              <div>
                <a href="{{route('add.cart',$show_latestproducts->id)}}" class="btn btn-primary my-2">Add to Cart</a>
              </div>
            </div>
          </div>
        @endforeach

        
      </div>
      <div class="btn-box">
        {{-- <a href="">
          View All Products
        </a> --}}
      </div>
    </div>
  </section>
@endsection