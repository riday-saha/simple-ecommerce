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
                    <form action="{{ route('login') }}" method="POST" class="login-userformhri">
                        @csrf
                        <h3 class="text-center mb-3">Log in</h3>
                        <!-- Email Address -->
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required autofocus autocomplete="username">
                            @error('email')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                            @error('password')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                         <!-- Remember Me -->
                         <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">Remember me</span>
                            </label>
                         </div>
                         <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                            <button type="submit" class="btn btn-success ms-3">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection