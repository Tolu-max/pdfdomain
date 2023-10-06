<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function lamladmaths() {
        return view('products/lamladmaths');
    }
}
