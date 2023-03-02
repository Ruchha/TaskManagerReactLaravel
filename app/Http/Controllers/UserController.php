<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' =>  ['required', Password::min(8)->letters()->mixedCase()->numbers()],
        ]);
        $input = $request->all();
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        return redirect('/'); //Need to add success message
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' =>  ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
