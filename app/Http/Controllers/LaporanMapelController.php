<?php

namespace App\Http\Controllers;

use App\Models\BatasMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->get('data');

        $mapel = BatasMapel::where('id' ,$data)->get();


        return view('laporanMapel',compact('data','mapel'),['title' => 'Laporan', 'role' => Auth::user()->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
