<?php

namespace App\Http\Controllers;

use App\Traits\ApiTrait;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    use ApiTrait;

    public function main() {
        $berita_paginate = $this->get_paginate_berita('walkot farm');

        return view("front.berita.main", [
            'jenis_page' => "Berita",
            'page' => "list",
            'berita_paginate' => $berita_paginate,
        ]);
    }

    public function detail_berita($id) {
        $berita_detail = $this->get_berita($id);

        if (!$berita_detail) {
            abort(404, 'Data berita yang dicari tidak ditemukan');
        }

        return view("front.berita.main", [
            'jenis_page' => "Berita",
            'page' => "detail",
            'berita_detail' => $berita_detail,
        ]);
    }

    public function index()
    {
        $berita_paginate = $this->get_paginate_berita('kegiatan');

        return view('front.admin.berita.list', [
            'beritas' => $berita_paginate['data'] ?? [],
            'pagination' => $berita_paginate,
        ]);
    }

    public function create()
    {
        return view('front.admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'reporter' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'pengunjung' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = basename($gambar);
        }

        Kegiatan::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Kegiatan::findOrFail($id);
        return view('front.admin.berita.show', compact('berita'));
    }

    //public function edit($id)
    //{
    //    $berita = Kegiatan::findOrFail($id);
    //    return view('front.admin.berita.edit', compact('berita'));
    //}

    //public function update(Request $request, $id)
    //{
    //    $berita = Kegiatan::findOrFail($id);

    //    $data = $request->validate([
    //        'judul' => 'required|string|max:255',
    //        'reporter' => 'required|string|max:255',
    //        'isi' => 'required|string',
    //        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //        'tanggal' => 'required|date',
    //        'pengunjung' => 'nullable|integer',
    //    ]);

        // Upload gambar jika ada file baru
    //    if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
    //        if ($berita->gambar && file_exists(public_path('storage/berita/' . $berita->gambar))) {
    //            unlink(public_path('storage/berita/' . $berita->gambar));
    //        }

    //        $gambarBaru = $request->file('gambar')->store('berita', 'public');
    //        $data['gambar'] = basename($gambarBaru);
    //    }

    //    $berita->update($data);

    //    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    //}

    //public function destroy($id)
    //{
    //    $berita = Kegiatan::findOrFail($id);
    //    $berita->delete();
    //    return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    //}
}
