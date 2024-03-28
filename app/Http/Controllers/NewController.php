<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request)
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
            } else if (Auth::user()->role == 'pengelola_gudang') {
                return redirect('admin/pengelolagudang');
            }
        } else {
            return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
    function create(){

    }
}
