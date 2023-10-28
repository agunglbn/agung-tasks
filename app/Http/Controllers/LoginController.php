<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function registeruser(Request $request)
    {
        $this->validate($request, rules: [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'passwordconf' => 'required_with:password|same:password|min:5'

        ]); // Validasi From

        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function loginproses(Request $request)
    {
        $this->validate($request, rules: [
            'email' => 'required',
            'password' => 'required',

        ]); // Validasi From
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashbord');
        }
        return \redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return \redirect('/login');
    }
}
