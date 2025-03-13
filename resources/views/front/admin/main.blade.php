@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Total Tanaman Yang Terdaftar Pada</h3>
    <h1>Walkot Farm</h1>

    <div class="row mt-4 align-items-start"> <!-- Memastikan sejajar ke atas -->
        <!-- Kategori Tanaman (Sebelah Kiri - Vertikal) -->
        <div class="col-md-4">
            <div class="card text-center p-3 shadow-sm mb-3">
                <h2 class="text-success">{{ $totalProduktif }}</h2>
                <p>Tanaman Produktif</p>
            </div>
            <div class="card text-center p-3 shadow-sm mb-3">
                <h2 class="text-success">{{ $totalToga }}</h2>
                <p>Tanaman Toga</p>
            </div>
            <div class="card text-center p-3 shadow-sm mb-3">
                <h2 class="text-success">{{ $totalHias }}</h2>
                <p>Tanaman Hias</p>
            </div>
        </div>

        <!-- Section List dan Tambah Tanaman (Sebelah Kanan - Vertikal, Sejajar dengan Atas) -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>List Tanaman</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.tanaman.list') }}" class="btn btn-success">Lihat Tanaman</a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h2>Tambah Tanaman</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.tanaman.create') }}" class="btn btn-primary">Tambah Tanaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
