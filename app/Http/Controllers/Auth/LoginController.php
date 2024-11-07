<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  // Impor Request dari Laravel
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // Redirect setelah login berhasil
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Method untuk menangani login
    public function login(Request $request)
    {
        // Ambil data 'nik' dan 'password' dari form
        $credentials = $request->only('nik', 'password');

        // Cek kredensial, jika valid, lakukan login
        if (Auth::attempt($credentials)) {
            // Jika login sukses, arahkan ke halaman home
            return redirect()->intended($this->redirectTo);
        }

        // Jika login gagal, kembalikan ke form dengan error
        return back()->withErrors(['nik' => 'Invalid NIK or password.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');  // Atau bisa ke halaman lain setelah logout
    }

    public function showLoginForm()
    {
        return view('auth.login');  // Menampilkan file Blade login
    }
}
