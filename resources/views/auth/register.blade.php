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
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page when
          looking at its layout. The point of using Lorem
        </p>
        <div>
          <a href="{{route('site.shop')}}" class="slider-link">
            Shop Now
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="loginn-uerform">
                    <form action="{{ route('register') }}" method="post" class="login-userformhri">
                        @csrf
                        <h3 class="text-center mb-3">Register</h3>
                        <!-- Name -->
                        <div>
                            <label for="name">Name</label>
                            <input type="text" class="form-control block mt-1 w-full" name="name" id="name" value="{{old('name')}}" required autofocus autocomplete="name">
                            @error('name')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control block mt-1 w-full" value="{{old('email')}}" required autofocus autocomplete="username">
                            @error('email')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Phone Address -->
                        <div class="mt-4">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control block mt-1 w-full" value="{{old('phone')}}" required autofocus autocomplete="username">
                            @error('phone')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Phone Address -->
                        <div class="mt-4">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control block mt-1 w-full" value="{{old('address')}}" required autofocus autocomplete="username">
                            @error('address')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control block mt-1 w-full" required autocomplete="new-password">
                            @error('password')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <!--Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control block mt-1 w-full" required autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                Already registered?
                            </a>
                            <button type="submit" class="btn btn-success ms-4">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection