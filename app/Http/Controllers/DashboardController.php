<?php

namespace App\Http\Controllers;

use App\Models\BatasMapel;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\BukuBatas;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
    function index(Request $request)
    {
        if (Auth::user()->roles == 'admin') {
            $gurus = Guru::with('user')->get();
            $kelas = Kelas::with('user')->get();
            $siswa = Siswa::all();
            $mapel = Matapelajaran::all();
            $jurusan = Jurusan::all();
            

            $user = Auth::user();

            // dd($user);
            $laporan = BukuBatas::orderBy('id','desc')->get();

            $hadir = 0;
            $tidakHadir = 0;

            foreach($laporan as $isi){
                if($isi->file_path == null){
                    $tidakHadir++;
                }else{
                    $hadir++;
                }
            }

            $batasmapel = BatasMapel::all();
            // dd($batasmapel);
            $tercapai = 0;
            $tidakTercapai = 0;

            foreach($batasmapel as $isi){
                if($isi->keterangan == 'Selesai'){
                    $tercapai++;
                }else {
                    $tidakTercapai++;
                }
                
            }
            $onlineUsers = User::online()->get();
            

            // $admin = User::where('username', 'password');
            return view('dashboard.admin', compact(['tercapai','tidakTercapai','hadir','tidakHadir','gurus', 'kelas', 'laporan','user', 'siswa', 'mapel', 'jurusan','onlineUsers']), ['title' => 'Dashboard', 'role' => Auth::user()->roles]);
        
        } elseif (Auth::user()->roles == 'guru') {
            $start_date = Carbon::parse($request->get('start_date'))->format('Y-m-d');
            $end_date = Carbon::parse($request->get('end_date'))->format('Y-m-d');

            $bukubatas = BukuBatas::
            filter($request->all())
            ->where('guru', Auth::user()->id)
            ->whereDate('created_at','>=',$start_date)
            ->whereDate('created_at','<=', $end_date)
            ->orderBy('id','desc')
            ->paginate(10);

            $jurusan = Jurusan::get();
            return view('dashboard.guru',compact( 'bukubatas' ,'jurusan'), ['title' => 'Dashboard', 'role' => Auth::user()->roles]);
        
        } elseif (Auth::user()->roles == 'kelas') {
            return view('dashboard.error', ['title' => 'Dashboard', 'role' => Auth::user()->roles]);
        }

     
    }

    // public function guru (Request $request){

    //     if(Auth::user()->roles == 'guru') {
    //     $start_date = Carbon::parse($request->get('start_date'))->format('Y-m-d');
    //         $end_date = Carbon::parse($request->get('end_date'))->format('Y-m-d');

    //         $bukubatas = BukuBatas::
    //         filter($request->all())
    //         ->where('guru', Auth::user()->id)
    //         ->whereDate('created_at','>=',$start_date)
    //         ->whereDate('created_at','<=', $end_date)
    //         ->orderBy('id','desc')
    //         ->paginate(10);

    //         $jurusan = Jurusan::get();
    //         return view('dashboard.guru',compact( 'bukubatas' ,'jurusan'), ['title' => 'Dashboard', 'role' => Auth::user()->roles]);
           
    //     } elseif (Auth::user()->roles == 'kelas') {
    //             return view('dashboard.error', ['title' => 'Dashboard', 'role' => Auth::user()->roles]);
    //         }
    // } 
    function laporan()
    {
        return view('laporan', ['title' => 'Laporan', 'role' => Auth::user()->roles]);
    }
    // function profileadmin()
    // {
        //     // $admin = User::first();
        //     $admin = session('admin');
        //     dd($admin);
        
        
        //     // dd($admin);
        //     return view('profileadmin.profile',compact('admin'), ['title' => 'Profile', 'role' => Auth::user()->roles]);
        // }
        // function update(Request $request, $id)
        // {
            //     // $admin = session('admin');
            //     $admin = User::find(Auth::user()->id);
            //     // $admin = User::first();
            //     $admin->username = $request->username;
            //     $admin->password = $request->password;
            
            
            //     return redirect()->route('profileadmin.update',  ['title' => 'Edit Profile', 'role' => Auth::user()->roles]) ;
            // }


            // function edit()
            // {
            //     $admin = User::first();
            //     return view('profileadmin.edit', compact('admin'),['title' => 'Edit Profile', 'role' => Auth::user()->roles]);
            // }
        }
        