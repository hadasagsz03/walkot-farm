<header class="header-style-1 wow fadeIn">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ asset('/') }}"><img src="{{ asset('storage/images/logo/logo.png') }}" width="40%" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="{{ asset('/') }}">Beranda</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{ asset('/tentang') }}">Tentang</a> </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tanaman </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ asset('tanaman/kategori/produktif') }}">Tanaman Produktif</a></li>
                        <li><a href="{{ asset('tanaman/kategori/toga') }}">Tanaman Toga</a></li>
                        <li><a href="{{ asset('tanaman/kategori/hias') }}">Tanaman Hias</a></li>
                    </ul>
                </li>
                <li class="nav-item"> <a class="nav-link" href="{{ asset('/berita') }}">Berita</a> </li>
            </ul>
        </div>
    </nav>
</header>