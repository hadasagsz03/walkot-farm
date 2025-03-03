<?php

namespace App\Http\Controllers;

use App\Traits\ApiTrait;

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
}
