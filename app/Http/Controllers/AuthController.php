<?php

namespace App\Http\Controllers;

use index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login page
     *
     * @return [type]
     */
    public function index() {

        // Cek apakah user sudah login atau belum
        if (Auth::check()) {
            return redirect()->route('dashboard.home.index');
        }

        return view('pages.login.index');
    }

    /**
     * Method untuk login user
     *
     * @param Request $request
     */
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.home')->with('login', 'Selamat datang boss');
        }

        return back()->withInput()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Cek apakah user sudah login atau belum
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('landing.index');
        }

        return redirect()->route('dashboard.home');
    }
}
