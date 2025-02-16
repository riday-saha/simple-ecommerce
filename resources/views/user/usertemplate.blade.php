
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Mokta</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrapcommerce.css')}}" />
  <!-- font awesome style -->
  <link href="{{asset('css/font-awesomecommerce.min.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('css/stylecommerce.css')}}" rel="stylesheet" />
   <!-- Custom styles(hridoy) for this template -->
  <link rel="stylesheet" href="{{asset('css/customuser.css')}}">
   <!-- Image zoom styles for this template -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- responsive style -->
  <link href="{{asset('css/responsivecommerce.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.html">
          <span>
            Mokta Jewellery
          </span>
        </a>
        <div class="" id="">

          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="{{route('site.home')}}">Home</a>
                <a href="{{route('site.home')}}">About</a>
                <a href="{{route('site.shop')}}">Shop</a>
                @auth
                  @if (Auth::user()->user_type == 'admin')
                  <a href="{{route("admin.dashboard")}}">Admin Dashboard</a>
                  @endif
                @endauth
                @if (Auth::check())
                  <a href="{{route('my.cart')}}">Cart({{$count}})</a>
                  <a href="{{route('all.orders')}}">All Orders</a>
                  <a href="{{route('delivered.orders')}}">Delivered Orders</a>
                  <a href="{{route('profile.edit')}}">My Profile</a>
                  <form method="POST" action="{{ route('logout') }}" style="display: inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="border: 2px solid red;border-radius:0;background:red;font-weight:700;padding:30px 50px">Log Out</button>
                  </form> 
                  
                @else
                  <a href="{{route('login')}}">Log in</a>
                  <a href="{{route('register')}}">Register</a>
                @endif
              </div>
            </div>
          </div>

        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

  <!-- slider section -->
@yield('slider')
  <!-- end slider section -->
  @yield('contents')
  <!-- shop section -->

  @yield('latest-product')

  <!-- end shop section -->

  <!-- about section -->

  <!-- end about section -->

  <!-- offer section -->

  <!-- end offer section -->

  <!-- blog section -->

  <!-- end blog section -->

  <!-- client section -->


  <!-- end client section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">

          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row info_main_row">
        <div class="col-md-6 col-lg-3">
          <div class="info_links">
            <h4>
              Menu
            </h4>
            <div class="info_links_menu">
              <a href="index.html">Home</a>
              <a href="about.html">About</a>
              <a href="shop.html">Shop</a>
              <a href="blog.html">Blog</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_insta">
            <h4>
              Instagram
            </h4>
            <div class="insta_box">
              <div class="img-box">
                <img src="images/p1.png" alt="">
              </div>
              <p>
                long established fact that a reader
              </p>
            </div>
            <div class="insta_box">
              <div class="img-box">
                <img src="images/p2.png" alt="">
              </div>
              <p>
                long established fact that a reader
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_detail">
            <h4>
              About Us
            </h4>
            <p class="mb-0">
              when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h4>
            Contact Us
          </h4>
          <div class="info_contact">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +01 1234567890
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="">Hridoy</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="{{asset('js/jquerycommerce-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('js/bootstrapcommerce.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('js/customcommerce.js')}}"></script>

  <!-- XZOOM JQUERY PLUGIN  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}", "Success");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", "Error");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}", "Info");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", "Warning");
    @endif
</script>

{!! Toastr::message() !!}

<script>

$(document).ready(function() {
  $('.zoom').magnify();
});


</script>

</body>

</html>
