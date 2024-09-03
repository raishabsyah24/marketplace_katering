<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin');
    }

    function merchant()
    {
        echo "hallo, Selamat Datang di halaman Merchants";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

    function customer()
    {
        echo "hallo, Selamat Datang di halaman Customer";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
}
