<section class="wf100 p80 events">
<div class="event-grid">
    <div class="container">"
        <div class="row wow zoomIn" data-wow-delay="0.5s">
            @foreach ($tanaman as $t)
            <div class="col-lg-4 col-sm-6">
            <div class="event-post">
                <div class="event-thumb">
                    <a href="{{ asset('tanaman/detail/'.$t->id_tanaman) }}">
                        <i class="fas fa-link"></i>
                    </a>
                    <img src="{{ asset('storage/images/tanaman/'.$t->gambar) }}" alt="">
                </div>
                <div class="event-txt">
                    <h5><a href="{{ asset('tanaman/detail/'.$t->id_tanaman) }}">{{ $t->nama_tanaman_indonesia }}</a></h5>
                    <p>{{ $t->nama_tanaman_latin }}</p>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="gt-pagination mt20 wow zoomIn" data-wow-delay="0.8s">
                <nav>
                    {{ $tanaman->links() }}
                </nav>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
