<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Klasemen;
use App\Http\Controllers\Controller;

class KlasemenController extends Controller
{
    public function klasemen()
    {
        // Ambil data klasemen beserta data klub terkait
        $klasemen = Klasemen::with('club')->get();

        return view('clubs.klasemen', compact('klasemen'));
    }    
}
