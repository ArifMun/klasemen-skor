<?php

namespace App\Http\Controllers;

use App\Models\DataClub;
use App\Models\DataSkor;
use App\Models\KelasemenSkor;
use Illuminate\Http\Request;
use Lcobucci\JWT\Token\DataSet;
use Illuminate\Support\Facades\Validator;

class SkorController extends Controller
{
    public function index()
    {
        $klub = DataClub::all();
        return \view('klub.tambah-skor', \compact('klub'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'id_klub_1' => 'required|different:id_klub_2',
                'id_klub_2' => 'required|different:id_klub_1',
                'skor_1'    => 'required|integer',
                'skor_2'    => 'required|integer'
            ],
            [
                'id_klub_1.required' => 'Klub 1 harus dipilih',
                'id_klub_2.required' => 'Klub 2 harus dipilih',
                'id_klub_1.different' => 'Klub 1 harus berbeda dari klub 2',
                'id_klub_2.different' => 'Klub 2 harus berbeda dari klub 1',
                'skor_1.required'    => 'Skor 1 harus diisi',
                'skor_2.required'    => 'Skor 2 harus diisi',
                'skor_1.integer'     => 'Skor harus berupa angka',
                'skor_2.integer'     => 'Skor harus berupa angka',
            ]
        );

        if ($validate->fails()) {
            return \back()
                ->withErrors($validate)
                ->withInput()
                ->with('warning', 'Skor tidak tersimpan!');
        }

        DataSkor::create([
            'id_klub_1' => $request->id_klub_1,
            'id_klub_2' => $request->id_klub_2,
            'skor_1'    => $request->skor_1,
            'skor_2'    => $request->skor_2,
        ]);

        $kelasemen = new KelasemenSkor();
        if ($request->skor_1 > $request->skor_2) {
            $kelasemen->updateKelasemen($request->id_klub_1, 1, 0, 0, $request->skor_1, $request->skor_2, 3);
            $kelasemen->updateKelasemen($request->id_klub_2, 0, 0, 1, $request->skor_2, $request->skor_1, 0);
        } else if ($request->skor_1 < $request->skor_2) {
            $kelasemen->updateKelasemen($request->id_klub_1, 0, 0, 1, $request->skor_2, $request->skor_1, 0);
            $kelasemen->updateKelasemen($request->id_klub_2, 1, 0, 0, $request->skor_1, $request->skor_2, 3);
        } else {
            $kelasemen->updateKelasemen($request->id_klub_1, 0, 1, 0, $request->skor_1, $request->skor_2, 1);
            $kelasemen->updateKelasemen($request->id_klub_2, 0, 1, 0, $request->skor_2, $request->skor_1, 1);
        }

        return \redirect('/tambah-skor')->with('success', 'Skor pertandingan berhasil ditambahkan!');
    }

    public function multipleStore(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'multiple.*.id_klub_1' => 'required|different:multiple.*.id_klub_2',
                'multiple.*.id_klub_2' => 'required|different:multiple.*.id_klub_1',
                'multiple.*.skor_1'    => 'required|integer',
                'multiple.*.skor_2'    => 'required|integer'
            ],
            [
                'multiple.*.id_klub_1.required' => 'Klub 1 harus dipilih',
                'multiple.*.id_klub_2.required' => 'Klub 2 harus dipilih',
                'multiple.*.id_klub_1.different' => 'Klub 1 harus berbeda dari klub 2',
                'multiple.*.id_klub_2.different' => 'Klub 2 harus berbeda dari klub 1',
                'multiple.*.skor_1.required'    => 'Skor 1 harus diisi',
                'multiple.*.skor_2.required'    => 'Skor 2 harus diisi',
                'multiple.*.skor_1.integer'     => 'Skor harus berupa angka',
                'multiple.*.skor_2.integer'     => 'Skor harus berupa angka',
            ]
        );
        // \dd($validate);
        if ($validate->fails()) {
            return \back()
                ->withErrors($validate)
                ->withInput()
                ->with('warning', 'Skor tidak tersimpan!');
        }

        foreach ($request->input('multiple') as $item) {
            DataSkor::create([
                'id_klub_1' => $item['id_klub_1'],
                'id_klub_2' => $item['id_klub_2'],
                'skor_1'    => $item['skor_1'],
                'skor_2'    => $item['skor_2'],
            ]);

            $kelasemen = new KelasemenSkor();
            if ($item['skor_1'] > $item['skor_2']) {
                $kelasemen->updateKelasemen($item['id_klub_1'], 1, 0, 0, $item['skor_1'], $item['skor_2'], 3);
                $kelasemen->updateKelasemen($item['id_klub_2'], 0, 0, 1, $item['skor_2'], $item['skor_1'], 0);
            } else if ($item['skor_1'] < $item['skor_2']) {
                $kelasemen->updateKelasemen($item['id_klub_1'], 0, 0, 1, $item['skor_1'], $item['skor_1'], 0);
                $kelasemen->updateKelasemen($item['id_klub_2'], 1, 0, 0, $item['skor_1'], $item['skor_2'], 3);
            } else {
                $kelasemen->updateKelasemen($item['id_klub_1'], 0, 1, 0, $item['skor_1'], $item['skor_2'], 1);
                $kelasemen->updateKelasemen($item['id_klub_2'], 0, 1, 0, $item['skor_2'], $item['skor_1'], 1);
            }
        }


        return \redirect('/multiple-tambah-skor')->with('success', 'Skor pertandingan berhasil ditambahkan!');
    }

    public function multipleIndex()
    {
        $klub = DataClub::all();
        return \view('klub.multiple-tambah-skor', \compact('klub'));
    }
}
