<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Kegiatan;
use App\Models\TanamanDetail;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function get_footer_data() {
        $footer['kegiatan'] = Kegiatan::orderByDesc('tanggal')->limit(3)->get();
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function login() {
        $footer = $this->get_footer_data();
        return view("front.auth.login", [
            'jenis_page' => 'Login',
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }

    public function login_view() {
        if (Auth::check()) {
            return redirect()->route('admin.main'); // 🔧 Perbaikan: arahkan ke dashboard admin
        }
        return view("front.auth.login", [
            'page' => "Login"
        ]);
    }

    public function login_auth(Request $request) {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|string',
            'captcha'  => 'required|captcha'
        ];

        $messages = [
            'email.required'   => 'Email wajib diisi',
            'email.email'      => 'Email tidak valid',
            'password.required'=> 'Password wajib diisi',
            'password.string'  => 'Password harus berupa string',
            'captcha.required' => 'Captcha wajib diisi',
            'captcha.captcha'  => 'Captcha yang diinput salah'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            User::where('id', Auth::id())->update(['email_verified_at' => Carbon::now()]);
            return redirect()->route('admin.main'); // ✅ Redirect ke dashboard admin
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->back(); // 🔧 Perbaikan: kembali ke halaman login, bukan "/"
        }
    }

    public function reloadCaptcha() {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function logout() {
        if (Auth::check()) { // 🔧 Tambahkan pengecekan sebelum logout
            Auth::logout();
        }
        return redirect('/');
    }
}
