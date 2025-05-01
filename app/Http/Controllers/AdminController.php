<?php

namespace App\Http\Controllers;

use App\Models\TanamanDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\VisitorStatistic;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('front.admin.home.dashboard');
    }

    public function main()
    {
        // Menghitung jumlah tanaman berdasarkan kategori di tabel TanamanDetail
        $totalProduktif = TanamanDetail::where('id_kategori', 1)->count(); // Kategori Produktif
        $totalToga = TanamanDetail::where('id_kategori', 2)->count(); // Kategori Toga
        $totalHias = TanamanDetail::where('id_kategori', 3)->count(); // Kategori Hias

        // Ambil data tanaman untuk galeri (misalnya 10 tanaman pertama)
        $tanamans = TanamanDetail::take(10)->get();

        return view('front.admin.home.dashboard', compact('totalProduktif', 'totalToga', 'totalHias', 'tanamans'));
    }
}
