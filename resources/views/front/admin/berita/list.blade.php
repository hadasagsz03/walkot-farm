@extends('front.admin.main')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Daftar Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center text-green-800 font-semibold px-4 py-2 rounded-lg hover:bg-white transition duration-300">
        <i class="bi bi-plus-circle-fill mr-2"></i> Tambah Berita
    </a>
</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Semua Kegiatan</h2>

    <table class="min-w-full text-sm text-left">
        <thead class="bg-green-800 text-white font-semibold">
            <tr>
                <th class="p-2">Id</th>
                <th class="p-2">Judul</th>
                <th class="p-2">Reporter</th>
                <th class="p-2">Isi</th>
                <th class="p-2">Tanggal</th>
                <th class="p-2">Pengunjung</th>
                <th class="p-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $index => $berita)
            <tr class="odd:bg-gray-50 hover:bg-gray-100 transition">
                <td class="p-2">{{ $berita['id'] }}</td>
                <td class="p-2">{{ $berita['title'] }}</td>
                <td class="p-2">{{ $berita['writer'] }}</td>
                <td class="p-2">{{ \Illuminate\Support\Str::limit(strip_tags($berita['content']), 30) }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($berita['published_at'])->isoFormat('D MMMM Y') }}</td>
                <td class="p-2">{{ $berita['viewed'] }}</td>
                <td class="p-2 text-center space-x-2">
                    <a href="{{ route('admin.berita.show', ['id' => $berita['id']]) }}" class="text-blue-600 hover:text-blue-800" title="Lihat Detail">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    {{-- <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-yellow-500" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                    </a> --}}
                    {{-- <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-2 border text-center text-gray-500">Belum ada kegiatan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
