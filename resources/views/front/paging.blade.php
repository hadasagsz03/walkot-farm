<section class="wf100 p100 inner-header">
    @isset($jenis_page)
    <div class="container wow slideInDown">
        @if($jenis_page == "Tanaman")
        <h1>Tanaman {{ ucwords($jenis) }} </h1>
        <ul>
            <li><a href="{{ asset('/') }}">Beranda</a></li>
            <li><a href="{{ asset('tanaman/kategori/'.$jenis) }}"> Tanaman {{ ucwords($jenis) }} </a></li>
            @if ($subpage == "detail")
            <li><a href="#"> {{ $tanaman->nama_tanaman_indonesia }} </a></li>
            @endif
        </ul>

        @elseif($jenis_page == "Tentang")
        <h1>{{ $jenis_page }} </h1>
        <ul>
            <li><a href="{{ asset('/') }}">Beranda</a></li>
            <li><a href="{{ asset('/tentang') }}">Tentang Walkot Farm</a></li>
        </ul>

        @elseif($jenis_page == "Kegiatan")
        <h1>{{ $jenis_page }} </h1>
        <ul>
            <li><a href="{{ asset('/') }}">Beranda</a></li>
            <li><a href="{{ asset('/kegiatan') }}">Kegiatan Walkot Farm</a></li>
        </ul>

        @elseif($jenis_page == "Login")
        <h1>{{ $jenis_page }} </h1>
        <ul>
            <li><a href="{{ asset('/') }}">Beranda</a></li>
            <li><a href="{{ asset('/login') }}">Login</a></li>
        </ul>

        @else
        <h1>{{ $jenis_page }} </h1>
        <ul>
            <li><a href="{{ asset('/') }}">Beranda</a></li>
        </ul>
        @endif
    </div>
    @endisset
</section>