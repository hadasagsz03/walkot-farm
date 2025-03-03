<!--About Section Start-->
<section class="home2-about wf100 p100 gallery">
<div class="container">
    <div class="row">
        <div class="col-md-5 wow fadeInLeft" data-wow-delay="1.0s">>
            <div class="video-img"> <a href="https://youtu.be/oEEhiwTbefU" data-rel="prettyPhoto" title="Peresmian Walkot Farm 4 0 Jakarta Barat"><i class="fas fa-play"></i></a> <img src="images/h2about.jpg" alt=""> </div>
        </div>
        <div class="col-md-7">
            <div class="h2-about-txt wow fadeInLeft" data-wow-delay="1.0s">
                <h3>Walkot Farm</h3>
                <h2>Tanaman Terintegrasi</h2>
                <p>Dalam rangka mengembangkan konsep pertanian perkotaan (urban farming) di Ibukota yang bertujuan untuk mendorong pelaksanaan pertanian perkotaan dan pemanfaatan lahan kosong serta membantu peningkatan Ruang Terbuka Hijau (RTH) melalui aktivitas budidaya, pengolahan, pemasaran dan pendistribusian bahan pangan yang berasal dari tanaman, hewan dan ikan serta produk olahannya yang terjadi di dalam dan sekitar perkotaan.</p>
                <a class="aboutus" href="{{ asset('/tentang') }}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<div class="home-facts counter pt80">
    <div class="container">
        <div class="row">
            @foreach ($totaltanaman as $key => $tt)
            <div class="col-lg-4 col-sm-12 col-md-12">
            <div class="counter-box wow zoomIn" data-wow-delay="1.0s">
                <p class="counter-count">{{ $tt }}</p>
                <p class="ctxt">Tanaman {{ ucwords($key) }}</p>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
<!--About Section End-->
