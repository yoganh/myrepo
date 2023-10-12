<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tim_satu',
        'skor_satu',
        'tim_dua',
        'skor_dua',
        'point_tim_satu',
        'point_tim_dua',
    ];

    public function klubTimSatu()
    {
        return $this->belongsTo(Club::class, 'tim_satu', 'nama');
    }
    
    public function klubTimDua()
    {
        return $this->belongsTo(Club::class, 'tim_dua', 'nama');
    }
    
}
