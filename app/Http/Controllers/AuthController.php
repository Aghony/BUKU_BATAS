<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi!!',
            'password.required' => 'Password wajib diisi!!'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            
            if ($user->roles == 'admin') {
                return redirect()->intended('/dashboard');
            }
            if ($user->roles == 'guru') {
            
                // $namaguru = $user->name;
                // session(['namaguru' => $namaguru]);


                return redirect()->intended('/');
            }
            if ($user->roles == 'kelas') {
                // Fetch the kelas data
                $kelas = Kelas::where('user_id', $user->id)->first();
                session(['kelas' => $kelas]);

                // if ($kelas) {
                //     // Store kelas data in the session
                // } else {
                //     return redirect('/some-error-page')->withErrors('Kelas not found for this user.');
                // }
                
                return redirect()->intended('/absenkelas');
            }
        } else {
            return redirect('')->withErrors(
                'Username and Password yang di masukan tidak sesuai !!',
            )->withInput();
        }
    }

    function logout()
    {
        auth::logout();
        return redirect('');
    }
}
