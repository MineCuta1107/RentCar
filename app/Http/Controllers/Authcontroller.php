<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function showregister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'position' => 'required',
            'username' => 'required|unique:users',
            'number_phone' => 'required',
            'password' => 'required|min:6'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'member';

        User::create($validated);

        return redirect()->route('login')->with('success', 'Anda berhasil mendaftar');
    }


    public function logout(){
        Auth::logout();
        return redirect('');
    }


    public function showlogin(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('member.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
}
