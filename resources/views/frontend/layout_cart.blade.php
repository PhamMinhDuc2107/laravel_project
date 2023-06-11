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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset("frontend/css/reset.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/home.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/blog.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/blogDetail.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/login.css") }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/ProductDetail.css') }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/cart.css") }}">
  <link rel="stylesheet" href="{{ asset("frontend/css/app.css") }}">

</head>
<body>
  <div class="wrapper">
    {{-- header --}}
    @include('frontend.blocks.header')
    {{-- /header --}}
    {{-- navBar  --}}
    @include('frontend.blocks.navBar')
    {{-- /navBar  --}}
    {{-- main --}}
    @yield("data-view")
    {{-- /main --}}
    {{-- footer --}}
    @include('frontend.blocks.footer')
    {{-- /footer --}}
  </div>
</body>
<script src="{{ asset("frontend/js/app.js") }}"></script>
</html>