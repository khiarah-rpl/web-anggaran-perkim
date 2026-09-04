<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    return back()
        ->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])
        ->withInput($request->only('email'));
}

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                // VALIDASI: Hanya mengizinkan email resmi dinas (misal @mubakab.go.id atau @gmail.com yang didaftarkan)
                'regex:/^[A-Za-z0-9._%+-]+@(mubakab\.go\.id|gmail\.com)$/i'
            ],
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.regex' => 'Pendaftaran ditolak! Gunakan email dinas resmi kantor.'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun kantor berhasil dibuat! Silakan masuk.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}