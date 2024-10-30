<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::get();
        $kelas = Kelas::filter()->with('user')->get();
        return view('kelas.index',compact('jurusans','kelas'),['title'=>'Akun Kelas','role' => Auth::user()->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $jurusans = Jurusan::get();
        $jurusansSelected = $request->get('jurusan');
        $kelasOptions = ['10', '11','12'];
        $subKelasOptions = [1, 2,3];
        return view('kelas.create', compact('jurusans','jurusansSelected','kelasOptions','subKelasOptions'),['title'=>'Akun Kelas','role' => Auth::user()->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'username' => 'required|string|max:225|unique:users,username',
            'email' => 'nullable|string|max:225|email|unique:users,email',
            'password' => 'required|string|min:8',
            'jurusan_id'=>'required|integer',
            'celas' => 'required|string',
            'sub_kelas'=>'required|integer',
        ]);
        $kelas = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'kelas',
        ]);
        Kelas::create([
            'user_id' => $kelas->id,
            'jurusan_id' => $request->jurusan_id,
            'celas' => $request->celas,
            'sub_kelas'=>$request->sub_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success','akun kelas berhasil ditambahkan');
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
        $jurusans = Jurusan::get();
        $jurusansSelected = $request->get('jurusan');
        $subKelasOptions = [1, 2,3];
        $kelasOptions = ['10', '11','12'];
        $data = Kelas::findOrFail($id);
        $kela = Kelas::where('id', $id)->first();
        return view('kelas.edit',compact('data','kela','jurusans','jurusansSelected','kelasOptions','subKelasOptions'),['title' => 'Akun Kelas', 'role' => Auth::user()->roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $kela->user_id,
            'email' => 'nullable|string|max:255|email|unique:users,email,' . $kela->user_id,
            'password' => 'nullable|string|min:8',
            'jurusan_id' => 'required',
            'celas' => 'required',
        ]);

        $kela->user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $kela->user->password,
        ]);

        $kela->update([
            'jurusan_id' => $request->jurusan_id,
            'celas' => $request->celas,
        ]);

        return redirect()->route('kelas.index')->with('success','Data kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        $kela->user->delete();
        return redirect()->route('kelas.index')->with('success','Akun Kelas telah dihapus.');
    }
}
