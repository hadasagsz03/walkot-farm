@if(!session('tanaman_editing'))
    <script>
        window.location.href = "{{ route('admin.tanaman.list') }}";
    </script>
@endif

@extends('front.admin.header')

@section('content')
<div class="content-wrapper container mt-5">
<form action="{{ route('admin.tanaman.update', ['id' => $tanaman->id_tanaman]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nama_tanaman_indonesia">Nama Tanaman (Indonesia)</label>
        <input type="text" class="form-control" id="nama_tanaman_indonesia" name="nama_tanaman_indonesia" value="{{ $tanaman->nama_tanaman_indonesia }}">
    </div>

    <div class="form-group">
        <label for="nama_tanaman_latin">Nama Tanaman (Latin)</label>
        <input type="text" class="form-control" id="nama_tanaman_latin" name="nama_tanaman_latin" value="{{ $tanaman->nama_tanaman_latin }}">
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="5">{{ $tanaman->keterangan }}</textarea>
    </div>

    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control-file" id="gambar" name="gambar">
    </div>

    <div class="form-group">
        <label for="qrcode">QRCode</label>
        <input type="file" class="form-control-file" id="qrcode" name="qrcode">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
