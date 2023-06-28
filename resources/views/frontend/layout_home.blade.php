<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset("frontend/css/reset.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/home.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/blog.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/blogDetail.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/login.css") }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/ProductDetail.css') }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/cart.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/app.css") }}">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/64917eaacc26a871b0239e2e/1h3c5dj1c';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  @include("sweetalert::alert")

  <!--End of Tawk.to Script-->
  <div class="wrapper">
    {{-- header --}}
    @include('frontend.blocks.header')
    {{-- /header --}}
    {{-- slider --}}
    @include('frontend.blocks.slider')
    {{-- slider --}}
    {{-- main --}}
    @yield("data-view")
    {{-- /main --}}
    {{-- footer --}}
    @include('frontend.blocks.footer')
    {{-- /footer --}}
  </div>

</body>
<script src="{{ asset("frontend/js/app.js") }}"></script>
<script src="{{ asset("frontend/js/user.js") }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</html>