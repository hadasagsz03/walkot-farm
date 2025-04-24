@php
    $linkTambahan = [
        1 => 'https://barat.jakarta.go.id/walkot-farm/berita/3309',
        5 => 'https://barat.jakarta.go.id/walkot-farm/berita/3617',
        6 => 'https://barat.jakarta.go.id/walkot-farm/berita/3620',
        7 => 'https://barat.jakarta.go.id/walkot-farm/berita/3626',
        9 => 'https://barat.jakarta.go.id/walkot-farm/berita/4075',
        11 => 'https://barat.jakarta.go.id/walkot-farm/berita/5836',
    ];

    // Redirect jika id ada di daftar
    if (array_key_exists($berita->id, $linkTambahan)) {
        echo "<script>window.location.href = '{$linkTambahan[$berita->id]}';</script>";
        exit; // hentikan eksekusi setelah redirect
    }
@endphp

@extends('front.admin.main')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>
    <div class="bg-white p-4 shadow rounded-lg">
        @if($berita->gambar)
            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Gambar Berita" class="mt-4" />
        @endif
        <br>
        <p>{{ $berita->reporter }}</p>
        <p>{{ $berita->tanggal }}</p>
        <br>
        <p>{{ $berita->isi }}</p>
    </div>
</div>
@endsection
