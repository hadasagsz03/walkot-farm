@extends('front.admin.header')

@section('content')
    <div class="content-wrapper container mt-5">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Tambah Tanaman Baru</h2>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.tanaman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Kategori -->
                <div class="mb-4">
                    <label class="block text-gray-700">Kategori</label>
                    <select name="id_kategori" class="w-full p-2 border rounded @error('id_kategori') border-red-500 @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Tanaman (Indonesia) -->
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Tanaman (Indonesia)</label>
                    <input type="text" name="nama_tanaman_indonesia" class="w-full p-2 border rounded @error('nama_tanaman_indonesia') border-red-500 @enderror" value="{{ old('nama_tanaman_indonesia') }}">
                    @error('nama_tanaman_indonesia')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Tanaman (Latin) -->
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Tanaman (Latin)</label>
                    <input type="text" name="nama_tanaman_latin" class="w-full p-2 border rounded @error('nama_tanaman_latin') border-red-500 @enderror" value="{{ old('nama_tanaman_latin') }}">
                    @error('nama_tanaman_latin')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="mb-4">
                    <label class="block text-gray-700">Keterangan</label>
                    <textarea name="keterangan" class="w-full p-2 border rounded @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Manfaat -->
                <div class="mb-4">
                    <label class="block text-gray-700">Manfaat</label>
                    <textarea name="manfaat" class="w-full p-2 border rounded @error('manfaat') border-red-500 @enderror">{{ old('manfaat') }}</textarea>
                    @error('manfaat')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-4">
                    <label class="block text-gray-700">Upload Gambar</label>
                    <input type="file" name="gambar" class="w-full p-2 border rounded @error('gambar') border-red-500 @enderror">
                    @error('gambar')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- QR Code -->
                <div class="mb-4">
                    <label class="block text-gray-700">Upload QR Code</label>
                    <input type="file" name="qrcode" class="w-full p-2 border rounded @error('qrcode') border-red-500 @enderror">
                    @error('qrcode')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Simpan</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection
