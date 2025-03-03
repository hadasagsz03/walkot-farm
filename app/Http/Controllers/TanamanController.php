<?php

namespace App\Http\Controllers;

use App\Models\TanamanDetail;
use App\Traits\ApiTrait;

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
}
