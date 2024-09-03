<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('invoices.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')
                        ->with('success', 'Invoice berhasil ditambahkan.');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $orders = Order::all();
        return view('invoices.edit', compact('invoice', 'orders'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'order_id' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')
                        ->with('success', 'Invoice berhasil diperbarui.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
                        ->with('success', 'Invoice berhasil dihapus.');
    }
}
