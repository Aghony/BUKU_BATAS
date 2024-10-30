<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class uiguruController extends Controller
{
    // function index()
    // {
    //     return view('uiguruhal1',['title'=>'uiguruhal1','role'=> Auth::user()->roles]);
    // }

    function halaman2(){
        return view('uiguruhal2',['title'=>'uiguruhal2','role'=> Auth::user()->roles]);
    }

    function halaman3(){
        return view('uiguruhal3',['title'=>'uiguruhal3','role'=> Auth::user()->roles]);
    }
}
