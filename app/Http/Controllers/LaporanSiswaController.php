<?php

namespace App\Http\Controllers;

use App\Models\BukuBatas;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use App\Exports\AbsenSiswaExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = $request->get('data');

        // Jika $data kosong, ambil data sebelumnya (misalnya dari session)
        if (empty($data)) {
            $data = $request->session()->get('previous_data'); // Misalkan ini data sebelumnya yang disimpan
        } else {
            // Simpan data ke session jika ada isinya
            $request->session()->put('previous_data', $data);
        }


        // dd($data);
        // $bukubatas = BukuBatas::orderBy('created_at', 'desc')->first();
        // dd($bukubatas->guru);
        $siswa = AbsenSiswa::filter($request->all())
            ->where('bukubatas_id', $data)
            ->get()
            ->sortBy(function ($item) {
                return $item->namasiswa->nama; // Mengurutkan berdasarkan nama
            })
        ;
        $keteranganOptions = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        // dd($siswa);
        return view('laporanAbsen', compact('keteranganOptions', 'data', 'siswa'), ['title' => 'Laporan', 'role' => Auth::user()->roles]);
    }

    public function export_excel()
    {
        return Excel::download(new AbsenSiswaExport, 'LaporanSiswa.xlsx');
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
