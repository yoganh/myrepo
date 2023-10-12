<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:clubs',
            'kota' => 'required',
        ]);
    
        Club::create([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);
    
        return redirect()->route('clubs.home')->with('success', 'Data klub berhasil disimpan.');
    }
    

}  
