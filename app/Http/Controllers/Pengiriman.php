<?php

namespace App\Http\Controllers;

use App\Models\AdminPengiriman;
use Illuminate\Http\Request;

class Pengiriman extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Sidebar.adminpengiriman');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fungsi.creatpengiriman');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminPengiriman $adminPengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminPengiriman $adminPengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminPengiriman $adminPengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminPengiriman $adminPengiriman)
    {
        //
    }
}
