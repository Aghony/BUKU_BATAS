<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jurusan;
use App\Models\BukuBatas;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   

        $start_date = Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->get('end_date'))->format('Y-m-d');

        $bukubatas = BukuBatas::
        filter($request->all())
        ->whereDate('created_at','>=',$start_date)
        ->whereDate('created_at','<=', $end_date)
        ->orderBy('id','desc')
        ->paginate(10);


        // $bukubatas = BukuBatas::whereDate('created_at','>=',$start_date)
        // ->whereDate('created_at','<=', $end_date)
        // ->get();
        $jurusan = Jurusan::get();
        // dd($jurusan);
        return view('laporan',compact( 'bukubatas' ,'jurusan'),['title' => 'Laporan', 'role' => Auth::user()->roles]);
    }
    
    public function export_excel(Request $request){
        $start_date = Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $end_date = Carbon::parse($request->get('end_date'))->format('Y-m-d');

        return Excel::download(new LaporanExport($start_date, $end_date), "Laporan_{$start_date}_to_{$end_date}.xlsx");
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
