<section class="wf100 p80 blog">
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="blog-single-content wow fadeIn">
                        <div class="blog-single-thumb">
                            <img src="https://barat.jakarta.go.id/storage/images/berita/{{ $berita_detail['img'] }}">
                        </div>
                        <h3>{{ $berita_detail['title'] }}</h3>
                        <ul class="post-meta">
                            <li><i class="fas fa-user-circle"></i> {{ $berita_detail['writer'] }}</li>
                            <li><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($berita_detail['published_at'])->isoFormat('D MMMM Y')}}</li>
                            <li><i class="fas fa-eye"></i> {{ $berita_detail['viewed'] }} Views</li>
                        </ul>
                        <p class="text-justify"> {!! $berita_detail['content'] !!}</p>
                        <div class="row">
                            @if($berita_detail['img_2'])
                            <div class="col">
                                <img class="w-100" src="https://barat.jakarta.go.id/storage/images/berita/{{ $berita_detail['img_2'] }}">
                            </div>
                            @endif

                            @if($berita_detail['img_3'])
                            <div class="col">
                                <img class="w-100" src="https://barat.jakarta.go.id/storage/images/berita/{{ $berita_detail['img_3'] }}">
                            </div>
                            @endif
                            
                            @if($berita_detail['img_4'])
                            <div class="col">
                                <img class="w-100" src="https://barat.jakarta.go.id/storage/images/berita/{{ $berita_detail['img_4'] }}">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 wow fadeIn" data-wow-delay="0.9s">
                    @include('front.berita.sidebar')
                </div>
            </div>
        </div>
    </div>
</section>