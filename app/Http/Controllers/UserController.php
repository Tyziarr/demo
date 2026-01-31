<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegister()
    {
        return view('auth.login');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'login' => 'required|string|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect('/main');
    }

    public function showLogin()
    {
        return view('auth.authorization');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('login', $credentials['login'])->first();

        if ($user && Auth::attempt(['login' => $user->login, 'password' => $credentials['password']])) {
            session()->regenerate();
            return redirect('/main');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ])->withInput();
    }

}
