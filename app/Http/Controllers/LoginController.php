<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home()
    {
        return view('home');
    }
    // =============================
    public function login()
    {
        return view('login');
    }
    // =============================
    public function logar(Request $r)
    {
        $credentials = $r->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            toast('Usuario ou Senha Invalido', 'error');
            return redirect()->back();
        }
    }
    // =============================
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
