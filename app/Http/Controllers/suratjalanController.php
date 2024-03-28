<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suratjalanController extends Controller
{
    public function index(){
        return view('Fungsi.suratjalan');
    }
}
