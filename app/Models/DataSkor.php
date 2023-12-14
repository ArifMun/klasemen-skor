<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSkor extends Model
{
    use HasFactory;
    protected $table = 'data_skor';
    protected $fillable = [
        'id_klub_1',
        'id_klub_2',
        'skor_1',
        'skor_2',
    ];

    public function dataClubSatu()
    {
        return $this->belongsTo(DataClub::class, 'id_klub_1');
    }

    public function dataClubDua()
    {
        return $this->belongsTo(DataClub::class, 'id_klub_2');
    }
}
