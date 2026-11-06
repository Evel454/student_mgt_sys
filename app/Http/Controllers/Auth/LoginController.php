<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 1. Look for the user by email
        $user = User::where('email', $request->email)->first();

        // 2. Email not found
        if (! $user) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Login failed: this email is not registered.');
        }

        // 3. Email found but password is wrong
        if (! Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Login failed: the password is incorrect.');
        }

        // 4. Both are correct, so log the user in
        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        if ($user->can('manage students')) {
            $target = '/students';
        } elseif ($user->can('register for course')) {
            $target = '/courses';
        } else {
            $target = '/';
        }

        return redirect($target)->with('success', 'Login successful. Welcome, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have logged out.');
    }
}