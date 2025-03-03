<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <title>Walkot Farm</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper home2">
        @include('front.header')
        @include('front.paging')
        <section class="wf100 p80 current-projects">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-2">
                            <img src="{{ asset('images/error-image.png') }}" alt="Error image" class="error-image">
                            <h1 class="error-title">@yield('code')</h1>
                            <h2 class="mb-2">@yield('title')</h2>
                            <p class="error-message">@yield('message')</p>
                            <a href="{{ url()->previous() }}" class="error-kembali mx-2">Kembali</a>
                            <a href="https://wa.me/+6281211255934?text=Halo! Saya menemukan permasalahan teknis {{ $exception->getStatusCode() }} pada microsite Walkot-Farm Jakarta Barat pada saat mengakses dengan URL: {{ request()->url() }}. dan stack trace error: {{ $exception->getMessage() }}" target="_blank" class="error-laporkan mx-2"><span>Laporkan</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.footer')
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @stack('scripts')
</body>

</html>