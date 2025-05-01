@extends('front.admin.main')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Daftar Tanaman</h1>
    <a href="{{ route('admin.tanaman.create') }}" class="inline-flex items-center font-semibold text-green-800 px-4 py-2 rounded-lg hover:bg-white transition duration-300">
        <i class="bi bi-plus-circle-fill mr-2"></i> Tambah Tanaman
    </a>
</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tanaman Kategori: {{ $kategori }}</h2>

    <table class="min-w-full text-sm text-left">
        <thead class="bg-green-800 text-white font-semibold">
            <tr>
                <th class="p-2 w-24">ID Tanaman</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Nama Indonesia</th>
                <th class="p-2">Nama Latin</th>
                <th class="p-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tanaman as $item)
            <tr class="odd:bg-gray-50 hover:bg-gray-100 transition">
                <td class="p-2 w-24">{{ $item->id_tanaman }}</td>
                <td class="p-2">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td class="p-2">{{ $item->nama_tanaman_indonesia }}</td>
                <td class="p-2 italic">{{ $item->nama_tanaman_latin }}</td>
                <td class="p-2 text-center space-x-2">
                    <a href="{{ route('admin.tanaman.detail', ['id_tanaman' => $item->id_tanaman]) }}" class="text-blue-600" title="Lihat Detail">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <a href="{{ route('admin.tanaman.edit', ['id' => $item->id_tanaman]) }}" class="text-yellow-500" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('admin.tanaman.delete', ['id' => $item->id_tanaman]) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
