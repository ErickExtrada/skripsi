<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'administrator') {
                return redirect('/admin');
            }

            if (Auth::user()->role == 'pengelola_gudang') {
                return redirect('/pengelola-gudang');
            }
        }

        return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
