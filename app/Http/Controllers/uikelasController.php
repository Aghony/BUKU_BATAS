<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class uikelasController extends Controller
{
    function index()
    {
        return view('uikelas',['title'=>'uikelas','role'=> Auth::user()->roles]);
    }
}
