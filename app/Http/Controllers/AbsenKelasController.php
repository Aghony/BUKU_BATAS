<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\BukuBatas;
use App\Models\AbsenKelas;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use App\Models\Matapelajaran;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;

class AbsenKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get kelas data from session
        $gurus = Guru::with('user')->get();
        $kelas = session('kelas');
        $matapelajaran = Matapelajaran::get();
        $siswa = Siswa::where('kelas', $kelas->celas)->where('jurusan_id', $kelas->jurusan_id)->where('sub_kelas', $kelas->sub_kelas)->get();
        $keteranganOptions = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        // dd(vars: $kelas);
        return view('absenkelas.absenKelas', compact('gurus','matapelajaran', 'siswa', 'kelas', 'keteranganOptions'), ['title' => 'Abse Kelas', 'role' => Auth::user()->roles]);

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
        $keterangan = $request->input('keterangan'); // Ini adalah array ID siswa dan keterangan mereka
        $kelas = session('kelas');

        BukuBatas::create([
            'guru' => $request->input('guru'),
            'jurusan_id' => $kelas->jurusan_id,
            'sub_kelas' => $kelas->sub_kelas,
            'kelas' => $kelas->celas,
            'matapelajaran' => $request->input('matapelajaran'),
            'file_path' => null,
        ]);
        
        foreach ($keterangan as $siswaId => $keteranganValue) {
            AbsenSiswa::create([
                // 'kelas' => $kelas->celas,
                // 'matapelajaran_id' => $request->get('matapelajaran_id'),
                'siswas_id' => $siswaId, // ID siswa yang benar
                'bukubatas_id' => BukuBatas::orderBy('created_at', 'desc')->first()->id, // ID siswa yang benar
                'keterangan' => $keteranganValue // Keterangan untuk siswa tersebut
            ]);
        }
        return redirect()->route('absenkelas.index')->with('success', 'data berhasil dikirim!!');

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
