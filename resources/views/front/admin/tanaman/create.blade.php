@extends('front.admin.main')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full md:max-w-5xl bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
            <i class="bi bi-plus-circle-fill text-green-600"></i> Tambah Tanaman Baru
        </h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 flex items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.tanaman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Kategori --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Kategori</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-list-task text-gray-500"></i>
                    <select name="id_kategori" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('id_kategori') border-red-500 @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                @error('id_kategori')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama Tanaman Indonesia --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama Tanaman (Indonesia)</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-flower2 text-gray-500"></i>
                    <input type="text" name="nama_tanaman_indonesia" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nama_tanaman_indonesia') border-red-500 @enderror" value="{{ old('nama_tanaman_indonesia') }}">
                </div>
                @error('nama_tanaman_indonesia')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama Tanaman Latin --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama Tanaman (Latin)</label>
                <div class="flex items-center gap-2">
                    <i class="bi bi-type text-gray-500"></i>
                    <input type="text" name="nama_tanaman_latin" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nama_tanaman_latin') border-red-500 @enderror" value="{{ old('nama_tanaman_latin') }}">
                </div>
                @error('nama_tanaman_latin')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Keterangan</label>
                <textarea name="keterangan" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Manfaat --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Manfaat</label>
                <textarea name="manfaat" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('manfaat') border-red-500 @enderror">{{ old('manfaat') }}</textarea>
                @error('manfaat')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Upload Gambar</label>
                <input type="file" name="gambar" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('gambar') border-red-500 @enderror">
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Upload QR Code --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Upload QR Code</label>
                <input type="file" name="qrcode" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('qrcode') border-red-500 @enderror">
                @error('qrcode')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex justify-end pt-4 gap-2">
                <a href="{{ route('admin.tanaman.all') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
                    <i class="bi bi-arrow-left-circle"></i> Batal
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    <i class="bi bi-save-fill mr-2"></i> Simpan Tanaman
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
