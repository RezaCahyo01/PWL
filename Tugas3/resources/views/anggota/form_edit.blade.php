@extends('layout')
@section('content')
<div class="container">
    @foreach($data as $a)
    <h3>Form Edit {{ $a->nama }}</h3>
    <form action="{{ route('anggota.update',$a->id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Anggota</label>
            <input type="text" name="nama" value="{{ $a->nama }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Email Anggota</label>
            <input type="text" name="email" value="{{ $a->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Hp Anggota</label>
            <input type="text" name="hp" value="{{ $a->hp }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Foto Anggota</label>
            <input type="file" name="foto" value="{{ $a->foto }}" class="form-control">
        </div>

        <button class="btn btn-outline-success" name="proses" type="submit">Simpan</button>
        <a href="{{ url('/anggota') }}" class="btn btn-outline-danger" name="unproses" type="reset">Batal</a>
    </form>
    @endforeach
</div>

@endsection