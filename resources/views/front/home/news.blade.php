<section class="h2-news wf100 p80">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title-2">
                    <h5 class="wow slideInDown" data-wow-delay="0.5s">Baca Berita Terbaru</h5>
                    <h2 class="wow slideInDown" data-wow-delay="0.5s">Walkot Farm</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('/berita') }}" class="view-more wow zoomIn" data-wow-delay="0.5s">Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="row">
            @if(isset($footer['berita']) && (is_array($footer['berita'])))
            @foreach ($footer['berita'] as $index => $kt)
            @if($index == 4)
                @break
            @endif
            <div class="col-md-6">
                <div class="blog-small-post wow zoomIn" data-wow-delay="1.5s">
                    <div class="post-thumb">
                        <a href="{{ asset('/berita/'.$kt['id']) }}"><i class="fas fa-link"></i></a>
                        @if($kt['thumbnail'])
                        <img src="https://barat.jakarta.go.id/storage/images/berita/thumbnail/{{ $kt['thumbnail'] }}">
                        @else
                        <img src="https://barat.jakarta.go.id/storage/images/berita/{{ $kt['img'] }}">
                        @endif
                    </div>
                    <div class="post-txt">
                        <span class="pdate">
                            <div class="row">
                                <div class="col-8"><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($kt['published_at'])->isoFormat('D MMMM Y') }}</div>
                                <div class="col-4"><i class="fas fa-eye"></i> {{ $kt['viewed'] }}</div>
                            </div>
                        </span>
                        <h5><a href="{{ asset('/berita/'.$kt['id']) }}"> {!! Str::limit($kt['title'], 50) !!}</a></h5>
                        <p>{!! Str::limit($kt['content'], 90) !!}</p>
                        <a href="{{ asset('/berita/'.$kt['id']) }}" class="rm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
