<div class="sidebar">
    <div class="side-widget">
        <h5>Berita Terbaru</h5>
        <ul class="lastest-products">
            @foreach ($footer['berita'] as $index => $wk)
                @if($index == 5)
                    @break
                @endif
                <li>
                    @if($wk['thumbnail'])
                    <img style="width: 100px;" src="https://barat.jakarta.go.id/storage/images/berita/thumbnail/{{ $wk['thumbnail'] }}">
                    @else
                    <img style="width: 100px;" src="https://barat.jakarta.go.id/storage/images/berita/{{ $wk['img'] }}">
                    @endif
                    <strong><a href="{{ asset('/berita/'.$wk['id']) }}">{!! Str::limit($wk['title'], 20) !!}</a></strong>
                    <span class="pdate"><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($wk['published_at'])->isoFormat('D MMMM Y')}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>