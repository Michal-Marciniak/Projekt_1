<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if(!$user) {
            return redirect(route('login'))
                ->with('errorUserNotExist', 'User with this email does not exist.');
        } else {
            if (Hash::check($request->password, $user->password)) {
                Session::put('user_id', $user->id);
                return redirect()->intended('/');
            } else {
                return redirect(route('login'))
                    ->with('errorLogin', 'Wrong email or password');
            }
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user) {
            return redirect(route('login'))
                ->with('success', 'User registered successfully!');
        } else {
            return redirect(route('register'))
                ->with('error', 'Registration Failed, try again.');
        }
    }

    public function logout() {
        Session::flush();
        return redirect(route('login'))->with('logout', 'You have been logged out.');
    }
}
