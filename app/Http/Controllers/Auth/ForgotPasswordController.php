<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ForgetPassword;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    use ForgetPassword;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
