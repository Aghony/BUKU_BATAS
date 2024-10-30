<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function onlineUsers()
    {
        $onlineUsers = User::where('is_online', )->get();
        
        return view('online-users', compact('onlineUsers'));
    }
}
