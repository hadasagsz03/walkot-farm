<footer class="footer">
    <div class="footer-top wf100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="wow fadeIn" data-wow-delay="0.2s">Sejarah Singkat</h4>
                        <p class="wow fadeIn" data-wow-delay="0.3s">Walkot Farm dicanangkan oleh Wali Kota Administrasi Jakarta Barat H. Rustam Effendi, Jumat 13 Desember 2019 di halaman Kantor Walikota, Walkot Farm merupakan metode pertanian berbasis teknologi.</p>
                        <a href="{{ asset('/tentang') }}" class="lm wow fadeIn" data-wow-delay="0.4s">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="wow fadeIn" data-wow-delay="0.5s">Berita Terbaru</h4>
                        <ul class="lastest-products">
                            @if(isset($footer['berita']) && is_array($footer['berita']))
                            @foreach ($footer['berita'] as $index => $fk)
                            @if($index == 3)
                                @break
                            @endif
                            <li class="wow fadeIn" data-wow-delay="0.6s">
                                @if($fk['thumbnail'])
                                <img style="width: 80px;" src="https://barat.jakarta.go.id/storage/images/berita/thumbnail/{{ $fk['thumbnail'] }}">
                                @else
                                <img src="https://barat.jakarta.go.id/storage/images/berita/{{ $fk['img'] }}">
                                @endif
                                <strong><a href="{{ asset('/berita/'.$fk['id']) }}">{!! Str::limit($fk['title'], 30) !!}</a></strong>
                                <span class="pdate"><i>Published:</i> {{ \Carbon\Carbon::parse($fk['published_at'])->isoFormat('D MMMM Y') }}</span>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <div id="fpro-slider" class="owl-carousel owl-theme wow fadeIn" data-wow-delay="0.7s">
                            @foreach ($footer['tanaman'] as $ft)
                            <div class="item">
                                <div class="f-product">
                                    <img style="height: 350px; object-fit: cover;" src="{{ asset('storage/images/tanaman/'.$ft->gambar) }}" alt="">
                                    <div class="fp-text">
                                        <h6><a href="{{ asset('tanaman/detail/'.$ft->id_tanaman) }}">{{ $ft->nama_tanaman_indonesia }}</a></h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyr wf100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p style="text-align: center;">© 2025 SUDIS KOMINFOTIK JAKARTA BARAT, ALL RIGHTS RESERVED</p>
                </div>
            </div>
        </div>
    </div>
</footer>
