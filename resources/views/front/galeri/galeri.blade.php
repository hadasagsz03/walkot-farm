<!--Contact Start-->
<div class="gallery wf100 p80">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="portfolio filter-gallery">
            <div id="filters" class="button-group pull-right">
                <button class="button is-checked" data-filter="*">All</button>
                <button class="button" data-filter=".f1">Tanaman Hias</button>
                <button class="button" data-filter=".f2">Tanaman Toga</button>
                <button class="button" data-filter=".f3">Foto Kegiatan</button>
            </div>
            <div class="clearfix"></div>
            <div class="isotope items">
                @foreach ($tanamanhias as $th)
                <div class="item f1 height2 wow zoomIn" data-wow-delay="0.5s">
                    <div class="gallery-img"> <a src="{{ asset('storage/images/tanaman/hias/'.$th->gambar) }}" data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> <img src="{{ asset('storage/images/tanaman/hias/'.$th->gambar) }}" alt=""> </div>
                </div>
                @endforeach

                @foreach ($tanamantoga as $tt)
                <div class="item f2 height2 wow zoomIn" data-wow-delay="0.5s">
                    <div class="gallery-img"> <a src="{{ asset('storage/images/tanaman/toga/'.$tt->gambar) }}" data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> <img src="{{ asset('storage/images/tanaman/toga/'.$tt->gambar) }}" alt=""> </div>
                </div>
                @endforeach

                @foreach ($kegiatan as $k)
                <div class="item f3 width2 wow zoomIn" data-wow-delay="0.5s">
                <div class="gallery-img"> <a src="{{ asset('storage/images/kegiatan/'.$k->gambar) }}" data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> <img src="{{ asset('storage/images/kegiatan/'.$k->gambar) }}" alt=""> </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--Contact End-->