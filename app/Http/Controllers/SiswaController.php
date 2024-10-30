<?php

namespace App\Http\Controllers;

use App\Exports\SiswasExport;
use App\Imports\SiswasImport;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $data = Siswa::OrderBy('nama', 'asc')->get();
        $siswas = Siswa::filter($request->all())->orderBy('id','desc')->paginate(10);

        $jurusans = Jurusan::get();
        $agamaOptions = ['Islam', 'Kristen Protestan','Kristen Katolik','Buddha','Hindu','Khonghucu'];

        return view('siswa.index', compact('agamaOptions','siswas','jurusans','data'), ['title'=>'Siswa','role' => Auth::user()->roles]);
    }
    public function export_excel(){
        return Excel::download(new SiswasExport, "Siswa.xlsx");
    }

    public function import(){
        return view('siswa.import', ['title'=>'Siswa','role' => Auth::user()->roles]);
    }
    public function import_excel(Request $request){
        // dd($request->all());
        $request->validate([
            'file'=> 'required|file|mimes:xls,xlsx|max:10240'
        ]);
        Excel::import(new SiswasImport(), $request->file('file'));
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil di import');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $jurusans = Jurusan::get();
        $jurusansSelected = $request->get('jurusan');
        $genderOptions = ['Perempuan', 'Laki-laki'];
        $subKelasOptions = [1, 2,3];
        $kelasOptions = ['10', '11','12'];
        $agamaOptions = ['Islam', 'Kristen Protestan','Kristen Katolik','Buddha','Hindu','Khonghucu'];
        return view('siswa.create',compact('genderOptions', 'jurusansSelected', 'jurusans','subKelasOptions','kelasOptions','agamaOptions'), ['title'=>'Siswa','role' => Auth::user()->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id'=>'required|integer',
            'kelas'=>'required|string',
            'sub_kelas'=>'required|integer',
            'nisn' => 'string|nullable',
            'nama' => 'required|string',
            'agama' => 'required|string',
            'gender' => 'required|string',
            'tanggal_lahir' => 'date|nullable',
        ]);

        Siswa::create([
            'jurusan_id'=>$request->jurusan_id,
            'sub_kelas'=>$request->sub_kelas,
            'kelas'=>$request->kelas,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'agama'=>$request->agama,
            'gender'=>$request->gender,
            'tanggal_lahir'=>$request->tanggal_lahir,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
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
        $agamaOptions = ['Islam', 'Kristen Protestan','Kristen Katolik','Buddha','Hindu','Khonghucu'];
        $data = Siswa::findOrFail($id);
        $siswas = Siswa::where('id', $id)->first();
        $genderOptions = ['Perempuan', 'Laki-laki'];
        return view('siswa.edit',compact('siswas', 'data','genderOptions' ,'jurusans','subKelasOptions','kelasOptions','agamaOptions'),['title'=>'Siswa','role' => Auth::user()->roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jurusan_id'=>'required',
            'sub_kelas'=>'required',
            'kelas'=>'required|string',
            'nisn' => 'string|nullable',
            'nama' => 'required|string',
            'agama' => 'required|string',
            'gender' => 'required|string',
            'tanggal_lahir' => 'date|nullable',
        ]);

        $data = Siswa::findOrFail($id);
        $data->update([
            'jurusan_id'=>$request->jurusan_id,
            'sub_kelas'=>$request->sub_kelas,
            'kelas'=>$request->kelas,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'agama'=>$request->agama,
            'gender'=>$request->gender,
            'tanggal_lahir'=>$request->tanggal_lahir,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Siswa telah dihapus.');
    }
}
