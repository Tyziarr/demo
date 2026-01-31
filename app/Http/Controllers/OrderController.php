<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('orders.index', compact('orders'));
    }
public function showForm()
{
return view('orders.create');
}

public function store(Request $request)
{
$validated = $request->validate([
'course_name' => 'required|string|max:255',
'desired_start_date' => 'required|date',
'payment_method' => 'required|in:cash,transfer',
'phone' => 'required_if:payment_method,transfer|nullable|regex:/^\+?[0-9]{10,15}$/',
]);

Order::create([
'user_id' => Auth::id(),
'course_name' => $validated['course_name'],
'desired_start_date' => $validated['desired_start_date'],
'payment_method' => $validated['payment_method'],
'phone' => $validated['phone'] ?? null,
'status' => 'Новая',
]);

return redirect('/orders')->with('success', 'Заявка отправлена администратору!');


}
}
