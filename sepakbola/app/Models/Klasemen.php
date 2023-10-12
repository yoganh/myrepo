<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;

    protected $fillable = ['ma', 'me', 's', 'k', 'gm', 'gk', 'point', 'club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }



    public static function updateKlasemen($clubName, $point, $goalScored, $goalConceded)
    {
        $club = Club::where('nama', $clubName)->first();

        if ($club) {
            $klasemen = Klasemen::where('club_id', $club->id)->first();

            if ($klasemen) {
                $klasemen->ma += 1;

                if ($goalScored > $goalConceded) {
                    // Tim menang
                    $klasemen->me += 1; // Menambahkan satu kemenangan
                    $klasemen->point += 3; // Menambahkan 3 poin untuk kemenangan
                } elseif ($goalScored < $goalConceded) {
                    // Tim kalah
                    $klasemen->k += 1; // Menambahkan satu kekalahan
                } else {
                    // Hasil imbang
                    $klasemen->s += 1; // Menambahkan satu pertandingan seri atau imbang
                    $klasemen->point += 1; // Menambahkan 1 poin untuk hasil imbang
                }

                $klasemen->gm += $goalScored;
                $klasemen->gk += $goalConceded;

                $klasemen->save();
            } else {
                Klasemen::create([
                    'club_id' => $club->id,
                    'ma' => 1,
                    'me' => ($goalScored > $goalConceded) ? 1 : 0, // Menambahkan 1 jika tim menang, 0 jika tidak
                    's' => ($goalScored == $goalConceded) ? 1 : 0, // Menambahkan 1 jika hasil imbang, 0 jika tidak
                    'k' => ($goalScored < $goalConceded) ? 1 : 0, // Menambahkan 1 jika tim kalah, 0 jika tidak
                    'gm' => $goalScored,
                    'gk' => $goalConceded,
                    'point' => ($goalScored > $goalConceded) ? 3 : (($goalScored == $goalConceded) ? 1 : 0), // Menambahkan poin sesuai dengan hasil pertandingan
                ]);
            }
        }
    }
}
