<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::all();
        return view('merchants.index', compact('merchants'));
    }

    public function create()
    {
        return view('merchants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        Merchant::create($request->all());

        return redirect()->route('merchants.index')
                        ->with('success', 'Merchant berhasil ditambahkan.');
    }

    public function show(Merchant $merchant)
    {
        return view('merchants.show', compact('merchant'));
    }

    public function edit(Merchant $merchant)
    {
        return view('merchants.edit', compact('merchant'));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        $merchant->update($request->all());

        return redirect()->route('merchants.index')
                        ->with('success', 'Merchant berhasil diperbarui.');
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();

        return redirect()->route('merchants.index')
                        ->with('success', 'Merchant berhasil dihapus.');
    }
}
