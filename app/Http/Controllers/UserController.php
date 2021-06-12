<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Method view account form untuk update data user
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('pages.dashboard-account.index', compact('user'));
    }

    /**
     * method untuk update user akun
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(['username' => 'required|string|max:100']);

        if (isset($request->password) && !empty($request->password)) {
            $request->validate(['password' => 'min:6']);
            $user->password = Hash::make(htmlspecialchars($request->password));
        }

        $user->username = htmlspecialchars($request->username);
        $user->save();

        return redirect()->route('dashboard.account')->with("success", "Account updated successfully");
    }
}
