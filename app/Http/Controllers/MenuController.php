<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $merchants = Merchant::all();
        return view('menus.create', compact('merchants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|max:2048',
        ]);

        $path = $request->file('photo')->store('menu_photos', 'public');

        Menu::create([
            'merchant_id' => $request->merchant_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $path,
        ]);

        return redirect()->route('menus.index')
                        ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $merchants = Merchant::all();
        return view('menus.edit', compact('menu', 'merchants'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'merchant_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($menu->photo) {
                Storage::disk('public')->delete($menu->photo);
            }
            // Store new photo
            $path = $request->file('photo')->store('menu_photos', 'public');
        } else {
            $path = $menu->photo;
        }

        $menu->update([
            'merchant_id' => $request->merchant_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $path,
        ]);

        return redirect()->route('menus.index')
                        ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        // Delete photo
        if ($menu->photo) {
            Storage::disk('public')->delete($menu->photo);
        }
        $menu->delete();

        return redirect()->route('menus.index')
                        ->with('success', 'Menu berhasil dihapus.');
    }
}
