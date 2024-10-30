<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\BukuBatas;
use Illuminate\Http\Request;
use App\Models\Matapelajaran;
use Illuminate\Support\Facades\Auth;

class BukuBatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $guru = Guru::where('user_id', Auth::user()->id)->get();
        // $namaguru = session('namaguru');
        // dd($namaguru);
        $jurusans = Jurusan::get();
        $jurusansSelected = $request->get('jurusan');
        $subKelasOptions = [1, 2, 3];
        $kelasOptions = ['10', '11', '12'];
        $matapelajarans = Matapelajaran::get();
        $matapelajaranSelected = $request->get('matapelajarans');
        return view('bukubatas.absenGuru', compact('guru','jurusans', 'jurusansSelected', 'subKelasOptions', 'kelasOptions', 'matapelajarans', 'matapelajaranSelected'), ['title' => 'uiguruhal1', 'role' => Auth::user()->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $jurusans = Jurusan::get();
        // $jurusansSelected = $request->get('jurusan');
        // $subKelasOptions = [1, 2,3];
        // $kelasOptions = ['X', 'XI','XII'];
        // $matapelajarans = Matapelajaran::get();
        // $matapelajaranSelected = $request->get('matapelajarans');
        // return view('bukubatas.absenGuru',compact('jurusans','jurusansSelect','subKelasOptions','kelasOptions','matapelajarans','matapelajaranSelected' ),['title'=>'uiguruhal1','role'=> Auth::user()->roles]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $namaguru = session('namaguru');


        $request->validate([
            'guru' => 'nullable|integer',
            'jurusan_id' => 'required|integer',
            'sub_kelas' => 'required|integer',
            'kelas' => 'required|string',
            'matapelajaran' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
        ]);

        // Simpan file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('images', 'public'); // Menyimpan file di folder "images" dalam disk "public"
        } else {
            $filePath = null;
        }

        BukuBatas::create([
            'guru' => Auth::user()->id,
            'jurusan_id' => $request->input('jurusan_id'),
            'sub_kelas' => $request->input('sub_kelas'),
            'kelas' => $request->input('kelas'),
            'matapelajaran' => $request->input('matapelajaran'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('absensisiswa.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(string $id,Request $request)
    {
        // $namaguru = session('namaguru');

        // $data = BukuBatas::findOrFail($id);
        $data = BukuBatas::where('id',$id)->first();
        $jurusans = Jurusan::all();
        $jurusansSelected = $request->get('jurusan');
        $subKelasOptions = [1, 2, 3];
        $kelasOptions = ['10', '11', '12'];
        $matapelajarans = Matapelajaran::all();
        $matapelajaranSelected = $request->get('matapelajarans');
        return view('bukubatas.edit', compact('data','jurusans', 'jurusansSelected', 'subKelasOptions', 'kelasOptions', 'matapelajarans', 'matapelajaranSelected'), ['title' => 'uiguruhal1', 'role' => Auth::user()->roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $namaguru = session('namaguru');

        // $request->validate([
        //     'guru' => 'required|integer',
        //     'jurusan_id' => 'required',
        //     'sub_kelas' => 'required',
        //     'kelas' => 'required|string',
        //     'matapelajaran' => 'required|string',
        //     'file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
        // ]);
        $data = BukuBatas::findOrFail($id);
                // Simpan file jika ada
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filePath = $file->store('images', 'public'); // Menyimpan file di folder "images" dalam disk "public"
                } else {
                    $filePath = null;
                }
        $data->update([
            'guru' => Auth::user()->id,
            'jurusan_id' => $request->input('jurusan_id'),
            'sub_kelas' => $request->input('sub_kelas'),
            'kelas' => $request->input('kelas'),
            'matapelajaran' => $request->input('matapelajaran'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('absensisiswa.index')->with('success', 'Data berhasil disimpan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
