<?php

namespace App\Http\Controllers;

use App\Models\TanamanKategori;
use App\Models\TanamanDetail;
use App\Models\Tanaman;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    use ApiTrait;

    public function index($kategori)
    {
        $tanaman = TanamanDetail::whereHas('kategori', function ($query) use ($kategori) {
            $query->where('nama_kategori', $kategori);
        })->paginate(3);

        if (!count($tanaman)) {
            abort(404, 'Data kategori tanaman tidak ditemukan');
        }

        return view("front.tanaman.main", [
            'subpage' => "list",
            'jenis' => $kategori,
            'jenis_page' => "Tanaman",
            'tanaman' => $tanaman,
        ]);
    }

    public function detail($id_tanaman)
    {
        $tanaman = TanamanDetail::where('id_tanaman', $id_tanaman)->first();
        if (!$tanaman) {
            abort(404, 'Data tanaman yang dicari tidak ditemukan');
        }

        $paging_tanaman = array();
        $paging_tanaman['next'] = TanamanDetail::where('id_tanaman', '>', $id_tanaman)->min('id_tanaman');
        $paging_tanaman['previous'] = TanamanDetail::where('id_tanaman', '<', $id_tanaman)->max('id_tanaman');

        return view("front.tanaman.main", [
            'subpage' => "detail",
            'jenis' => $tanaman->kategori->nama_kategori,
            'jenis_page' => "Tanaman",
            'tanaman' => $tanaman,
            'paging_tanaman' => $paging_tanaman,
        ]);
    }

    public function list()
    {
        $kategoriProduktif = TanamanKategori::where('nama_kategori', 'Produktif')->first();
        $kategoriToga = TanamanKategori::where('nama_kategori', 'Toga')->first();
        $kategoriHias = TanamanKategori::where('nama_kategori', 'Hias')->first();

        $produktif = $kategoriProduktif
            ? TanamanDetail::with('kategori')->where('id_kategori', $kategoriProduktif->id_kategori)->get()
            : collect();

        $toga = $kategoriToga
            ? TanamanDetail::with('kategori')->where('id_kategori', $kategoriToga->id_kategori)->get()
            : collect();

        $hias = $kategoriHias
            ? TanamanDetail::with('kategori')->where('id_kategori', $kategoriHias->id_kategori)->get()
            : collect();

        return view('front.admin.tanaman.list', compact('produktif', 'toga', 'hias'));
    }

    public function show($id_tanaman)
    {
        $tanaman = Tanaman::findOrFail($id_tanaman); // Cari data berdasarkan ID
        $paging_tanaman = Tanaman::paginate(10);
        return view('front.admin.tanaman.detail', compact('tanaman', 'paging_tanaman'));
    }

    public function edit($id)
    {
        session(['tanaman_editing' => true]);

        $tanaman = TanamanDetail::findOrFail($id);
        return view('front.admin.tanaman.edit', compact('tanaman'));
    }

    public function update(Request $request, $id)
    {
        $tanaman = TanamanDetail::findOrFail($id);

        $data = $request->validate([
            'nama_tanaman_indonesia' => 'required|string|max:255',
            'nama_tanaman_latin' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qrcode' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('storage/images/tanaman'), $imageName);
            $data['gambar'] = $imageName;
        }

        if ($request->hasFile('qrcode')) {
            $imageName = time().'.'.$request->qrcode->extension();
            $request->qrcode->move(public_path('storage/images/qrcode'), $imageName);
            $data['qrcode'] = $imageName;
        }

        $tanaman->update($data);

        session()->forget('tanaman.editing');

        return redirect()->route('admin.tanaman.detail', ['id_tanaman' => $tanaman->id_tanaman])
                        ->with('success', 'Tanaman berhasil diperbarui');
    }

    public function create()
    {
        $kategori = TanamanKategori::all(); // Ambil data kategori dari database
        return view('front.admin.tanaman.create', compact('kategori'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'id_kategori' => 'required|integer|exists:tanaman_kategori,id_kategori',
            'nama_tanaman_indonesia' => 'required|string|max:100',
            'nama_tanaman_latin' => 'required|string|max:100',
            'keterangan' => 'required|string',
            'manfaat' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'qrcode' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('storage/images/tanaman'), $imageName);
            $data['gambar'] = $imageName;
        }

        if ($request->hasFile('qrcode')) {
            $imageName = time().'.'.$request->qrcode->extension();
            $request->qrcode->move(public_path('storage/images/qrcode'), $imageName);
            $data['qrcode'] = $imageName;
        }

        TanamanDetail::create([
            'id_kategori' => (int) $request->id_kategori,
            'nama_tanaman_indonesia' => $request->nama_tanaman_indonesia,
            'nama_tanaman_latin' => $request->nama_tanaman_latin,
            'keterangan' => $request->keterangan,
            'manfaat' => $request->manfaat,
            'gambar' => $imageName,
            'qrcode' => $imageName,
        ]);

        return redirect()->route('admin.tanaman.list')->with('success', 'Tanaman berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Find the plant by ID
        $tanaman = Tanaman::findOrFail($id);

        // Delete the plant
        $tanaman->delete();

        // Redirect back with a success message
        return redirect()->route('admin.tanaman.list')->with('success', 'Tanaman berhasil dihapus!');
    }

    public function cari(Request $request)
    {
        $keyword = $request->query('q');

        if (!$keyword) {
            return redirect()->back()->with('error', 'Keyword tidak ditemukan');
        }

        $tanaman = Tanaman::where('nama_tanaman_indonesia', 'like', "%{$keyword}%")
            ->orWhere('nama_tanaman_latin', 'like', "%{$keyword}%")
            ->get();

        return view('front.admin.home.cari', compact('tanaman', 'keyword'));
    }

    public function showAll()
    {
        $tanaman = Tanaman::all();

        return view('front.admin.tanaman.list', [
            'tanaman' => $tanaman,
            'kategori' => 'Semua Tanaman',
            'total' => $tanaman->count()
        ]);
    }

    public function filterByKategori($kategori)
    {
        // Dapatkan ID kategori dari nama kategori
        $kategoriModel = TanamanKategori::where('nama_kategori', $kategori)->firstOrFail();

        // Ambil tanaman berdasarkan ID kategori
        $tanaman = Tanaman::where('id_kategori', $kategoriModel->id_kategori)->get();

        return view('front.admin.tanaman.list', [
            'kategori' => $kategori,
            'tanaman' => $tanaman
        ]);
    }

}
