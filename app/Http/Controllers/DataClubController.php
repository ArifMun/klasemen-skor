<?php

namespace App\Http\Controllers;

use App\Models\DataClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataClubController extends Controller
{
    public function index()
    {
        return \view('klub.tambah-klub');
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'nama_klub' => 'required|unique:data_klub',
                'kota_klub' => 'required',
            ],
            [
                'nama_klub.unique'   => 'Klub sudah ada',
                'nama_klub.required' => 'Nama Klub harus diisi',
                'nama_kota.required' => 'Nama kota harus diisi',
            ]
        );

        // \dd($validate);
        if ($validate->fails()) {
            return \back()
                ->withErrors($validate)
                ->withInput();
        }

        DataClub::create([
            'nama_klub' => $request->nama_klub,
            'kota_klub' => $request->kota_klub
        ]);
        return \redirect('/tambah-klub')->with('success', 'Klub berhasil ditambahkan !');
    }
}
