<?php

namespace App\Http\Controllers;

use App\Models\TanamanDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('front.admin.main'); // Arahkan ke main.blade.php dalam folder front/admin
    }

    public function main()
    {
        // Menghitung jumlah tanaman berdasarkan kategori di tabel TanamanDetail
        $totalProduktif = TanamanDetail::where('id_kategori', 1)->count(); // Kategori Produktif
        $totalToga = TanamanDetail::where('id_kategori', 2)->count(); // Kategori Toga
        $totalHias = TanamanDetail::where('id_kategori', 3)->count(); // Kategori Hias

        return view('front.admin.main', compact('totalProduktif', 'totalToga', 'totalHias'));
    }
}
