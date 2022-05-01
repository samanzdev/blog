<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:5|max:30|unique:users|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_dash|min:6|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::loginUsingId($user->id);
        session()->flash('loginMessage', "ثبت نام با موفقیت انجام شد.");
        return redirect()->route('blog.index');
    }
}
