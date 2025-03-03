<section class="wf100 p80 events">
    <div class="event-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 wow fadeIn" data-wow-delay="0.5s">
                    @foreach ($berita_paginate['data'] as $k)
                    <div class="pro-list-box">
                        <div class="pro-thumb">
                            <a href="{{ asset('/berita/'.$k['id']) }}">
                                <i class="fas fa-link"></i>
                            </a>
                            @if($k['thumbnail'])
                            <img src="https://barat.jakarta.go.id/storage/images/berita/thumbnail/{{ $k['thumbnail'] }}">
                            @else
                            <img src="https://barat.jakarta.go.id/storage/images/berita/{{ $k['img'] }}">
                            @endif
                        </div>
                        <div class="pro-txt">
                            <ul class="event-meta">
                                <li><i class="fas fa-calendar-alt text-primary"></i> {{ \Carbon\Carbon::parse($k['published_at'])->isoFormat('D MMMM Y') }}</li>
                                <li><i class="fas fa-user text-success"></i> Reporter : {{ $k['writer'] }}</li>
                                <li><i class="fas fa-eye text-warning"></i> {{ $k['viewed'] }}</li>
                            </ul>
                            <h4> <a href="{{ asset('/berita/'.$k['id']) }}">{{ $k['title'] }}</a> </h4>
                            <p>{!! Str::limit(strip_tags($k['content']), 200) !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-4 wow fadeIn" data-wow-delay="0.9s">
                    @include('front.berita.sidebar')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gt-pagination mt20">
                        <nav>
                            @include('front.berita.pagination')
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>