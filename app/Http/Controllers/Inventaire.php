<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventaire extends Controller
{
    public function index()
    {
        return redirect()->route('inventaire');
    
    }
}
