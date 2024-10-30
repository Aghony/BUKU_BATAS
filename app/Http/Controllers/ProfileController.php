<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CheckOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                //     // $admin = User::first();
        //     dd($admin);
        
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
        // $id = session('admin');
        $user = User::where('id', $id)->first();

        // $user = Auth::user();

        // dd($user);
        return view('profileadmin.profile',compact('user'), ['title' => 'Profile', 'role' => Auth::user()->roles]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'new_password' => 'required',
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(Auth::user()->id )->update(['password'=>Hash::make($request->new_password)]);
        
    return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
