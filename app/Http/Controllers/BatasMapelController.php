<?php

namespace App\Http\Controllers;

use App\Models\BatasMapel;
use App\Models\BukuBatas;
use App\Models\Matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BatasMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $matapelajaran = Matapelajaran::get();
        // $matapelajaranSelected = $request->get('matapelajaran_id');
        $bukubatas = BukuBatas::orderBy('created_at', 'desc')->first();
        // dd($bukubatas);
        // $matapelajaran = $bukubatas->matapelajaran;
        // dd($bukubatas->matapelajaran);
        $keteranganOptions = ['Selesai', 'Belum Selesai'];

        return view('batasmapel.batasMapel', compact( 'bukubatas', 'keteranganOptions'), ['title' => 'uiguruhal3', 'role' => Auth::user()->roles]);
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
        $request->validate([
            'matapelajaran_id' => 'required|exists:matapelajarans,id',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        BatasMapel::create([
            'matapelajaran_id' => $request->get('matapelajaran_id'),
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
            'judul' => $request->input('judul'),
            'keterangan' => $request->input('keterangan'), // Ambil keterangan langsung
        ]);
        return redirect()->route('bukubatas.index')->with('success', 'data berhasil dikirim!!');
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
