@extends('layouts.main')
@section('title','Tambah Club')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card col-6">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Klub</h5>
            <div class="card ">
                <div class="card-body ">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="/tambah-klub/tambah" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama klub</label>
                            <input type="text" class="form-control" name="nama_klub" value="{{ old('nama_klub') }}">
                            @error('nama_klub')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kota klub</label>
                            <input type="text" class="form-control" name="kota_klub" value="{{ old('kota_klub') }}">
                            @error('kota_klub')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection