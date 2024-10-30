<?php

namespace App\Http\Controllers;

use App\Exports\MatapelajaranExport;
use App\Imports\MapelImport;
use Illuminate\Http\Request;
use App\Models\Matapelajaran;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matapelajaran = Matapelajaran::filter()->get();
        return view('matapelajaran.index',compact('matapelajaran'),['title'=>'Matapelajaran','role' => Auth::user()->roles]);
    }

    public function import()
    {
        return view('matapelajaran.import',['title'=>'Matapelajaran','role' => Auth::user()->roles]);
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file'=> 'required|file|mimes:xls,xlsx|max:10240'
        ]);
        Excel::import(new MapelImport(), $request->file('file'));
        return redirect()->route('matapelajaran.index')->with('success', 'Data Matapelajaran berhasil di import');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matapelajaran.create', ['title'=>'Matapeajaran','role' => Auth::user()->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nick' => 'required|string',
        ]);

        Matapelajaran::create([
            'name' => $request->name,
            'nick' => $request->nick,
        ]);

        return redirect()->route('matapelajaran.index')->with('success','Matapelajaran berhasil ditambahkan');
    
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
        $matapelajaran = Matapelajaran::where('id', $id)->first();
        return view('matapelajaran.edit',compact('matapelajaran'),['title'=>'Matapelajaran','role' => Auth::user()->roles]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matapelajaran $matapelajaran)
    {
        $request->validate([
            'name' => 'required|string',
            'nick' => 'required|string',
        ]);

        $matapelajaran->update([
            'name' => $request->name,
            'nick' => $request->nick,
        ]);

        return redirect()->route('matapelajaran.index')->with('success','Matapelajaran kelas berhasil diupdate');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matapelajaran $matapelajaran)
    {
        $matapelajaran->delete();
        return redirect()->route('matapelajaran.index')->with('success','Data Matapelajaran telah dihapus.');
    }
}
