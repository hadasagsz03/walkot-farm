@extends('front.admin.main')

@section('content')
<div class="container mt-6">
    <h2 class="text-2xl font-bold mb-4">
        🔍 Hasil Pencarian: <span class="text-green-600">{{ $keyword }}</span>
    </h2>

    @if($tanaman->isEmpty())
        <div class="alert alert-warning flex items-center gap-2 p-4 bg-yellow-100 text-yellow-800 rounded shadow-sm">
            <i class="bi bi-exclamation-triangle-fill"></i>
            Tidak ditemukan tanaman dengan nama: <strong>{{ $keyword }}</strong>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($tanaman as $item)
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4 hover:shadow-lg transition">
                    <section class="mb-4">
                        <a href="{{ route('admin.tanaman.detail', $item->id_tanaman) }}" class="block">
                            <img src="{{ asset('storage/images/tanaman/'.$item->gambar) }}" alt="{{ $item->nama_tanaman_indonesia }}" class="w-full h-48 object-cover rounded-lg mb-3">
                        </a>
                    </section>
                    <div class="flex items-center gap-3 mb-2">
                        <i class="bi bi-flower2 text-green-600 text-2xl"></i>
                        <div>
                            <h5 class="text-lg font-semibold text-green-700">{{ $item->nama_tanaman_indonesia }}</h5>
                            <p class="text-sm italic text-gray-500">{{ $item->nama_tanaman_latin }}</p>
                        </div>
                    </div>

                    <div class="text-sm text-gray-700 mt-2 space-y-1">
                        <!-- Kategori Berdasarkan id_kategori -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-tags-fill text-primary"></i>
                            <span>Kategori: {{ $item->kategori->nama_kategori ?? 'Tidak ada kategori' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('admin.home.dashboard') }}" class="btn btn-outline-success mt-6 inline-flex items-center gap-2">
        <i class="bi bi-arrow-left-circle"></i> Kembali ke Dashboard
    </a>
</div>
@endsection
