<?php

namespace App\Http\Controllers;

use App\Models\TanamanDetail;
use App\Models\TanamanKategori;
use App\Traits\ApiTrait;

class HomeController extends Controller
{
    use ApiTrait;

    public function get_footer_data() {
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function main() {
        $kategori = TanamanKategori::get();
        foreach ($kategori as $k) {
            $tanaman[$k->nama_kategori] = TanamanDetail::orderByDesc('id_tanaman')->where('id_kategori', $k->id_kategori)->limit(8)->get();
            $totaltanaman[$k->nama_kategori] = TanamanDetail::where('id_kategori', $k->id_kategori)->count();
        }

        $berita = $this->get_latest_berita('walkot farm');
        $footer = $this->get_footer_data();

        return view("front.home.main", [
            'tanaman' => $tanaman,
            'totaltanaman' => $totaltanaman,
            'berita' => $berita,
            'footertanaman' => $footer['tanaman']
        ]);
    }

    public function tentang() {
        $footer = $this->get_footer_data();
        $berita = $this->get_latest_berita('walkot farm');
        return view("front.about.main", [
            'berita' => $berita,
            'jenis_page' => 'Tentang',
            'footertanaman' => $footer['tanaman']
        ]);
    }
}
