@extends('layouts.main')
@section('title','Tambah Skor')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card col-8">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Skor</h5>
            <div class="card ">
                <div class="card-body ">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="/multiple-tambah-skor/tambah" method="POST">
                        @csrf
                        <div id="multiple-input">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Klub 1</label>
                                        <select name="multiple[0][id_klub_1]" id="multiple[0][id_klub_1]"
                                            class="form-control">
                                            <option value="" hidden>-- Pilih Klub --</option>
                                            @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
                                            @endforeach
                                        </select>
                                        @error('multiple.0.id_klub_1')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Klub 2</label>
                                        <select name="multiple[0][id_klub_2]" id="multiple[0][id_klub_2]"
                                            class="form-control">
                                            <option value="" hidden>-- Pilih Klub --</option>
                                            @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
                                            @endforeach
                                        </select>
                                        @error('multiple.0.id_klub_2')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Skor klub 1</label>
                                        <input type="text" class="form-control" name="multiple[0][skor_1]"
                                            value="{{ old('multiple[0][skor_1]') }}">
                                        @error('multiple.0.skor_1')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Skor klub 2</label>
                                        <input type="text" class="form-control" name="multiple[0][skor_2]"
                                            value="{{ old('multiple[0][skor_2]') }}">
                                        @error('multiple.0.skor_2')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" onclick="addSkor()">Tambah
                                        Skor</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let multipleSkor = 1;

function addSkor() {
const multipleContainer = document.getElementById('multiple-input');
const newSkor = document.createElement('div');

newSkor.innerHTML = `
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Klub 1</label>
                <select name="multiple[${multipleSkor}][id_klub_1]" id="multiple[${multipleSkor}][id_klub_1]" class="form-control">
                    <option value="" hidden>-- Pilih Klub --</option>
                    @foreach ($klub as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
                    @endforeach
                </select>
                @error('multiple.${multipleSkor}.id_klub_1')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Klub 2</label>
                <select name="multiple[${multipleSkor}][id_klub_2]" id="multiple[${multipleSkor}][id_klub_2]" class="form-control">
                    <option value="" hidden>-- Pilih Klub --</option>
                    @foreach ($klub as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
                    @endforeach
                </select>
                @error('multiple.${multipleSkor}.id_klub_2.')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Skor klub 1</label>
                <input type="text" class="form-control" name="multiple[${multipleSkor}][skor_1]"
                    value="{{ old('multiple[${multipleSkor}][skor_1]') }}">
                @error('multiple.${multipleSkor}.skor_1')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Skor klub 2</label>
                <input type="text" class="form-control" name="multiple[${multipleSkor}][skor_2]"
                    value="{{ old('multiple[${multipleSkor}][skor_2]') }}">
                @error('multiple.${multipleSkor}.skor_2')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
`;

multipleContainer.appendChild(newSkor);
multipleSkor++;
}
</script>
@endsection