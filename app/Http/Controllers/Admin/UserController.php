<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $user = User::query();

        if (request()->getQueryString() == null) {
            $user->orderBy('id', 'DESC');
        } elseif (request('search')) {
            $user->orderBy('id', 'DESC')->where('username', 'like', "%" . request('search') . "%")->orWhere('email', 'like', "%" . request('search') . "%");
        } else {
            $user->orderBy('id', 'DESC')->where('is_superuser', 1);
        }

        $user = $user->paginate(10);
        return view('admin.users.index', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:5|max:30|unique:users|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_dash|min:6|confirmed'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'is_superuser' => $request->is_superuser,
            'password' => Hash::make($request->password)
        ]);

        alert()->success('کاربر با موفقیت ایجاد شد.', 'با موفقیت');
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|min:5|max:30|alpha_dash|' . Rule::unique('users')->ignore($user->id),
            'email' => 'required|email|' . Rule::unique('users')->ignore($user->id)
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'is_superuser' => $request->is_superuser
        ]);

        alert()->success('کاربر با موفقیت ویرایش شد.', 'با موفقیت');
        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        alert()->error('کاربر با موفقیت حذف شد.', 'با موفقیت');
        return redirect()->route('admin.users.index');
    }
}
