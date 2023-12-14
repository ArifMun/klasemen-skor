<?php

namespace App\Http\Controllers;

use App\Models\KelasemenSkor;
use Illuminate\Http\Request;

class KelasemenSkorKontroller extends Controller
{
    public function index()
    {
        $kelasemen = KelasemenSkor::with('dataClub')->orderByDesc('point')->get();
        // \dd($kelasemen);
        return \view('klub.kelasemen', \compact('kelasemen'));
    }
}
