<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Matapelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matapelajaran = Matapelajaran::all();
        // $matapelajaranSelected == $request->get('matapelajaran');
        $gurus = Guru::filter()->with('user')->get();
        
        return view('guru.index', compact('gurus','matapelajaran'), ['title' => 'Akun Guru', 'role' => Auth::user()->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matapelajaranOptions = Matapelajaran::all();

        return view('guru.create',compact('matapelajaranOptions'), ['title' => 'Akun Guru', 'role' => Auth::user()->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'nullable|string||max:255|email|unique:users,email',
            'password' => 'required|string|min:8',
            'subject_array' => 'required|array',
            'subject_array.*'=>'required|integer'// Validasi setiap elemen array harus string
        ]);

        $gurus = User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'guru',
        ]);
        // foreach($request->subjects as $subject){
        Guru::create([
            'user_id' => $gurus->id,
            'subject_array' => $request->subject_array,
        ]);
        // }
        return redirect()->route('guru.index')->with('success', 'akun guru berhasil ditambahkan');
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
        $guru = Guru::where('id', $id)->first();
        $matapelajaranOptions = Matapelajaran::all();


        return view('guru.edit', compact('guru','matapelajaranOptions'), ['title' => 'Akun Guru', 'role' => Auth::user()->roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $guru->user_id,
            'email' => 'nullable|string|max:255|email|unique:users,email,' . $guru->user_id,
            'password' => 'nullable|string|min:8',
            'subject_array' => 'required|array',
            'subject_array.*'=>'required|string' // Validasi setiap elemen array harus string
        ]);


        $guru->user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $guru->user->password,
        ]);

        // Update the Guru model
        $guru->update([
            'subject_array' => $request->subject_array,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        $guru->user->delete();
        return redirect()->route('guru.index')->with('success', 'Akun Guru telah dihapus.');
    }
}
