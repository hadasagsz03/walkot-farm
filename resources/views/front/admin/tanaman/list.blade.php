@extends('front.admin.header')

@section('content')
<div class="content-wrapper container mt-5">
    <!-- Header -->
    <h5 class="text-success fw-bold">Tanaman Yang Terdaftar Pada</h5>
    <h2 class="fw-bold">Walkot Farm</h2>

    <!-- Filter Kategori -->
    <div class="d-flex gap-2 my-4">
        <button class="btn btn-success active" onclick="showCategory('produktif', this)">Tanaman Produktif</button>
        <button class="btn btn-outline-success" onclick="showCategory('toga', this)">Tanaman Toga</button>
        <button class="btn btn-outline-success" onclick="showCategory('hias', this)">Tanaman Hias</button>
    </div>

    <!-- Kategori Tanaman -->
    <div id="produktif" class="category-section active">
        <div class="row">
            @foreach ($produktif as $tanaman)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 tanaman-card">
                        <img src="{{ asset('storage/images/tanaman/' . $tanaman->gambar) }}" class="card-img-top rounded tanaman-image" alt="{{ $tanaman->nama_tanaman_indonesia }}">
                        <div class="overlay">
                            <a href="{{ route('admin.tanaman.detail', ['id_tanaman' => $tanaman->id_tanaman]) }}" class="btn btn-success btn-icon">
                                <i class="fas fa-link"></i>
                            </a>
                            <a href="{{ route('admin.tanaman.edit', ['id' => $tanaman->id_tanaman]) }}" class="btn btn-warning btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $tanaman->nama_tanaman_indonesia }}</h5>
                            <p class="text-muted"><i>{{ $tanaman->nama_tanaman_latin }}</i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Kategori Lainnya -->
    <div id="toga" class="category-section d-none">
        <div class="row">
            @foreach ($toga as $tanaman)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 tanaman-card">
                        <img src="{{ asset('storage/images/tanaman/' . $tanaman->gambar) }}" class="card-img-top rounded tanaman-image" alt="{{ $tanaman->nama_tanaman_indonesia }}">
                        <div class="overlay">
                            <a href="{{ route('admin.tanaman.detail', ['id_tanaman' => $tanaman->id_tanaman]) }}" class="btn btn-success btn-icon">
                                <i class="fas fa-link"></i>
                            </a>
                            <a href="{{ route('admin.tanaman.edit', ['id' => $tanaman->id_tanaman]) }}" class="btn btn-warning btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $tanaman->nama_tanaman_indonesia }}</h5>
                            <p class="text-muted"><i>{{ $tanaman->nama_tanaman_latin }}</i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="hias" class="category-section d-none">
        <div class="row">
            @foreach ($hias as $tanaman)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 tanaman-card">
                        <img src="{{ asset('storage/images/tanaman/' . $tanaman->gambar) }}" class="card-img-top rounded tanaman-image" alt="{{ $tanaman->nama_tanaman_indonesia }}">
                        <div class="overlay">
                            <a href="{{ route('admin.tanaman.detail', ['id_tanaman' => $tanaman->id_tanaman]) }}" class="btn btn-success btn-icon">
                                <i class="fas fa-link"></i>
                            </a>
                            <a href="{{ route('admin.tanaman.edit', ['id' => $tanaman->id_tanaman]) }}" class="btn btn-warning btn-icon">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $tanaman->nama_tanaman_indonesia }}</h5>
                            <p class="text-muted"><i>{{ $tanaman->nama_tanaman_latin }}</i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Load CSS & JS -->
<link rel="stylesheet" href="{{ asset('css/tanaman.css') }}">
<script src="{{ asset('js/tanaman.js') }}"></script>
@endsection
