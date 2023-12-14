<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataClub extends Model
{
    use HasFactory;
    protected $table = 'data_klub';
    protected $fillable = [
        'nama_klub',
        'kota_klub'
    ];

    public function dataSkorSatu()
    {
        return $this->hasMany(DataSkor::class, 'id_klub_1');
    }

    public function dataSkorDua()
    {
        return $this->hasMany(DataSkor::class, 'id_klub_2');
    }

    public function dataKelasemen()
    {
        return $this->hasOne(KelasemenSkor::class, 'id_klub');
    }
}
