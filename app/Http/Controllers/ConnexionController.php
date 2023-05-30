<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function show()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }

        return redirect()->back()->withErrors([
            'message' => 'Invalid credentials',
        ])->withInput($request->only('email'));
    }
}
