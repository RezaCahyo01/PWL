@extends('layout')
@section('content')
<div class="container">
    <h3>Form Anggota</h3>
    <form action="{{ route('anggota.store') }}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Anggota</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Email Anggota</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Hp Anggota</label>
            <input type="text" name="hp" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Foto Anggota</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-outline-success" name="proses" type="submit">Simpan</button>
        <a href="{{ url('/anggota') }}" class="btn btn-outline-danger" name="unproses" type="reset">Batal</a>
    </form>
</div>

@endsection