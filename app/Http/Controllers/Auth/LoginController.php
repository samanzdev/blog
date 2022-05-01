<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Vlidate data => email and password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_dash|min:6'
        ]);
        // find user by email
        $user = User::where('email', $request->email)->first();
        // check user email
        if (!$user) {
            session()->flash('errorMessage', 'کاربری با چنین اطلاعاتی یافت نشد.');
            return redirect()->back();
        }
        // check user password
        if (!Hash::check($request->password,$user->password)) {
            session()->flash('errorMessage', 'کاربری با چنین اطلاعاتی یافت نشد.');
            return redirect()->back();
        }

        Auth::loginUsingId($user->id);
        session()->flash('loginMessage', "ورود با موفقیت انجام شد.");
        return redirect()->route('blog.index');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('blog.index');
        }
        return redirect()->route('blog.index');
    }
}
