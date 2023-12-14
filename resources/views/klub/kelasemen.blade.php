@extends('layouts.main')
@section('title','Klasemen Skor')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card col-8">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Klasemen Skor</h5>
            <div class="card ">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Klub</th>
                                <th>Ma</th>
                                <th>Me</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelasemen as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->dataClub->nama_klub }}</td>
                                <td>{{ $item->main }}</td>
                                <td>{{ $item->menang }}</td>
                                <td>{{ $item->seri }}</td>
                                <td>{{ $item->kalah }}</td>
                                <td>{{ $item->gol_menang }}</td>
                                <td>{{ $item->gol_kalah }}</td>
                                <td>{{ $item->point }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection