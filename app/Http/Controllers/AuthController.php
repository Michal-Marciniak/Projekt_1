<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.loginForm');
    }

    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if(!$user) {
            return redirect(route('login-form'))
                ->with('error', 'User with this email does not exist.');
        } else {
            if (Hash::check($request->password, $user->password)) {
                Session::put('user_id', $user->id);
                return redirect()->intended('/')->with('success', 'Successfully logged in.');
            } else {
                return redirect(route('login-form'))
                    ->with('error', 'Wrong email or password');
            }
        }
    }

    public function registerForm() {
        return view('auth.registerForm');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($user) {
            return redirect(route('login-form'))
                ->with('success', 'User registered successfully!');
        } else {
            return redirect(route('register-form'))
                ->with('error', 'Registration Failed, try again.');
        }
    }

    public function logout() {
        Session::flush();
        return redirect(route('dashboard-page'))->with('success', 'You have been logged out.');
    }

    public function myAccountForm() {
        $user = User::findOrFail(Session::get('user_id'));
        return view('auth.myAccountForm', compact('user'));
    }

    public function resetPasswordForm() {
        return view('auth.resetPasswordForm');
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
            'new_password_repeat' => 'required|same:new_password',
        ]);
        $user = User::findOrFail(Session::get('user_id'));
        if (Hash::check($request->old_password, $user->password)) {
            if (Hash::check($request->new_password, $user->password)) {
                return redirect(route('reset-password-form'))->with('error', 'Password cannot be the same.');
            }
            else {
                $user->password = Hash::make($request->new_password);
                if($user->save()) {
                    return redirect(route('reset-password-form'))->with('success', 'Your password has been reset!');
                }
                else {
                    return redirect(route('reset-password-form'))->with('error', 'Something went wrong!');
                }
            }
        }
        else {
            return redirect(route('reset-password-form'))->with('error', 'Entered old password does not match.');
        }
    }
}
