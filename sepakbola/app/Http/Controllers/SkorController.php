<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\Skor;
use App\Models\Klasemen;

class SkorController extends Controller
{
    public function create()
    {
        $clubs = Club::all();
        return view('clubs.create_skor', compact('clubs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tim_satu' => 'required|array',
            'tim_satu.*' => 'required',
            'skor_satu' => 'required|array',
            'skor_satu.*' => 'required|integer',
            'tim_dua' => 'required|array',
            'tim_dua.*' => 'required',
            'skor_dua' => 'required|array',
            'skor_dua.*' => 'required|integer',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'integer' => 'Kolom :attribute harus berupa angka.',
        ]);

        $matches = count($validatedData['tim_satu']);
        for ($i = 0; $i < $matches; $i++) {
            $tim_satu = $validatedData['tim_satu'][$i];
            $skor_satu = $validatedData['skor_satu'][$i];
            $tim_dua = $validatedData['tim_dua'][$i];
            $skor_dua = $validatedData['skor_dua'][$i];

            if ($tim_satu === $tim_dua) {
                return redirect()->back()->with('error', 'Tim satu dan tim dua tidak boleh sama.');
            }

            $clubTimSatu = Club::where('nama', $tim_satu)->first();
            $clubTimDua = Club::where('nama', $tim_dua)->first();

            if ($clubTimSatu && $clubTimDua) {
                $matchExists = Skor::where(function ($query) use ($tim_satu, $tim_dua) {
                    $query->where('tim_satu', $tim_satu)
                        ->where('tim_dua', $tim_dua);
                })->orWhere(function ($query) use ($tim_satu, $tim_dua) {
                    $query->where('tim_satu', $tim_dua)
                        ->where('tim_dua', $tim_satu);
                })->exists();

                if ($matchExists) {
                    return redirect()->back()->with('error', 'Pertandingan antara kedua klub sudah pernah tercatat sebelumnya.');
                }

                $point_tim_satu = 0;
                $point_tim_dua = 0;
                if ($skor_satu > $skor_dua) {
                    $point_tim_satu = 3;
                } elseif ($skor_satu < $skor_dua) {
                    $point_tim_dua = 3;
                } else {
                    $point_tim_satu = 1;
                    $point_tim_dua = 1;
                }

                Skor::create([
                    'tim_satu' => $tim_satu,
                    'skor_satu' => $skor_satu,
                    'tim_dua' => $tim_dua,
                    'skor_dua' => $skor_dua,
                    'point_tim_satu' => $point_tim_satu,
                    'point_tim_dua' => $point_tim_dua,
                ]);

              
                Klasemen::updateKlasemen($tim_satu, $point_tim_satu, $skor_satu, $skor_dua);
                Klasemen::updateKlasemen($tim_dua, $point_tim_dua, $skor_dua, $skor_satu);
            } else {
                
                return redirect()->back()->with('error', 'Salah satu atau kedua tim tidak ditemukan.');
            }
        }

        return redirect()->route('clubs.klasemen')->with('success', 'Data skor berhasil diinputkan.');
    }
}
