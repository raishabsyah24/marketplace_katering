<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
                        ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $menus = Menu::all();
        return view('orders.edit', compact('order', 'menus'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'menu_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')
                        ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
                        ->with('success', 'Pesanan berhasil dihapus.');
    }
}
