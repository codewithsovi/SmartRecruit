<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function toLogin(){
        return view('auth.login');
    }

    public function prosesLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $infoLogin = $request->only('email', 'password');

        if (Auth::attempt($infoLogin)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'hrd') {
                return redirect()->route('home');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Berhasil logout');
    }

}
