@extends('front.admin.main')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full md:max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
            <i class="bi bi-pencil-square text-yellow-600"></i> Edit Kegiatan / Berita
        </h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 flex items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Judul</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-card-text text-gray-500"></i>
                    <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('judul') border-red-500 @enderror" required>
                </div>
                @error('judul')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Reporter --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Reporter</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-person-fill text-gray-500"></i>
                    <input type="text" name="reporter" value="{{ old('reporter', $berita->reporter) }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('reporter') border-red-500 @enderror" required>
                </div>
                @error('reporter')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Isi</label>
                <textarea name="isi" rows="6"
                          class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('isi') border-red-500 @enderror" required>{{ old('isi', $berita->isi) }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Gambar</label>
                @if($berita->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Gambar Berita" class="h-32 rounded shadow">
                    </div>
                @endif
                <input type="file" name="gambar"
                       class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('gambar') border-red-500 @enderror">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Tanggal</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-calendar-event text-gray-500"></i>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('tanggal') border-red-500 @enderror" required>
                </div>
                @error('tanggal')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pengunjung --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Jumlah Pengunjung</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-people-fill text-gray-500"></i>
                    <input type="number" name="pengunjung" value="{{ old('pengunjung', $berita->pengunjung) }}"
                           class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('pengunjung') border-red-500 @enderror">
                </div>
                @error('pengunjung')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex justify-end pt-4 gap-2">
                <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
                    <i class="bi bi-arrow-left-circle"></i> Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    <i class="bi bi-save-fill mr-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
