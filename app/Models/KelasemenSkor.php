<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasemenSkor extends Model
{
    use HasFactory;
    protected $table = 'kelasemen_skor';
    protected $fillable = [
        'id_klub',
        'main',
        'menang',
        'seri',
        'kalah',
        'gol_menang',
        'gol_kalah',
        'point'
    ];

    public function dataClub()
    {
        return $this->belongsTo(DataClub::class, 'id_klub');
    }

    public function updateKelasemen($id_klub, $menang, $seri, $kalah, $gol_menang, $gol_kalah, $point)
    {
        return self::updateOrCreate(
            ['id_klub' => $id_klub],
            [
                'main'          => self::where('id_klub', $id_klub)->value('main') + 1,
                'menang'        => self::where('id_klub', $id_klub)->value('menang') + $menang,
                'seri'          => self::where('id_klub', $id_klub)->value('seri') + $seri,
                'kalah'         => self::where('id_klub', $id_klub)->value('kalah') + $kalah,
                'gol_menang'    => self::where('id_klub', $id_klub)->value('gol_menang') + $gol_menang,
                'gol_kalah'     => self::where('id_klub', $id_klub)->value('gol_kalah') + $gol_kalah,
                'point'         => self::where('id_klub', $id_klub)->value('point') + $point,
            ]
        );
    }
}
