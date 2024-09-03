<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        echo "hallo, Selamat Datang";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }

    function guest()
    {
        echo "hallo, Selamat Datang Guest";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }

    function merchant()
    {
        echo "hallo, Selamat Merchants";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }

    function customer()
    {
        echo "hallo, Selamat Datang Customer";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout</a>";
    }
}
