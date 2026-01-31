<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($credentials['login'] === 'Admin' && $credentials['password'] === 'KorokNET') {
            Session::put('admin_logged_in', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Неверный логин или пароль.']);
    }

    public function dashboard()
    {
        $orders = Order::all();
        return view('admin.dashboard', compact('orders'));
    }

    public function updateStatus(Order $order, Request $request)
    {
        $request->validate(['status' => 'required|in:Новая,Идет обучение,Обучение завершено']);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Статус обновлён');
    }
}
