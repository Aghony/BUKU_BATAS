<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::filter()->get();
        return view('jurusan.index',compact('jurusan'),['title'=>'Jurusan','role' => Auth::user()->roles]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create', ['title'=>'Jurusan','role' => Auth::user()->roles]);
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

        Jurusan::create([
            'name' => $request->name,
            'nick' => $request->nick,
        ]);

        return redirect()->route('jurusan.index')->with('success','Jurusan berhasil ditambahkan');
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
        $jurusan = Jurusan::where('id', $id)->first();
        return view('jurusan.edit',compact('jurusan'),['title'=>'Jurusan','role' => Auth::user()->roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Jurusan $jurusan)
    {
        $request->validate([
            'name' => 'required|string',
            'nick' => 'required|string',
        ]);

        $jurusan->update([
            'name' => $request->name,
            'nick' => $request->nick,
        ]);

        return redirect()->route('jurusan.index')->with('success','Jurusan kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success','Data Jurusan telah dihapus.');
    }
}
