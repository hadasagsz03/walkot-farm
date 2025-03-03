<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\TanamanDetail;

class AuthController extends Controller
{
    public function get_footer_data() {
        $footer['kegiatan'] = Kegiatan::orderByDesc('tanggal')->limit(3)->get();
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function login() {
        $footer = $this->get_footer_data();
        return view("front.auth.main", [
            'jenis_page' => 'Login',
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }
}
