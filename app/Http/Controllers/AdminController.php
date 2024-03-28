<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        // echo"Admin Page";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='logout'>Logout >></a>";
        return view('adminDash');
    }
    function pengelolagudang(){
        //echo"Pengelola Gudang Page";
        //echo "<h1>". Auth::user()->name ."</h1>";
        //echo "<a href='/logout'>Logout >></a>";
        return view('dashboard');
    }
}
