<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="{{ asset('images/favicon.png') }}">
      <title>Walkot Farm - Home</title>
      <!-- CSS FILES START -->
      <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
      <link href="{{ asset('css/color.css') }}" rel="stylesheet">
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
      <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
      <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
      <!-- CSS FILES End -->
   </head>
   <body>
      <div class="wrapper home2">
      @include('front.home.header')
      @include('front.home.slider')
      @include('front.home.about')
      @include('front.home.tanaman')
      @include('front.home.quick')
      @include('front.home.news')
      @include('front.footer')
      </div>
      <!--   JS Files Start  -->
      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('js/jquery-migrate-1.4.1.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
      <script src="{{ asset('js/isotope.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="{{ asset('js/wow.min.js') }}"></script>
      <script>
      new WOW().init();
      </script>
      @stack('scripts')
   </body>
</html>
