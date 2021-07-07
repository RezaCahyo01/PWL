@extends('layout')
@php 
$ar_judul = ['No', 'Nama', 'Email', ' Hp', 'Foto', 'Action'];
$no = 1;
@endphp
@section('content')
<h3>Daftar Anggota</h3>

<a class="btn btn-outline-info" href="{{ route('anggota.create') }}"> Tambah </a>
<table class="table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_anggota as $a)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->hp }}</td>
            <td width="25%">
                @php
                if(!empty($a->foto)){
                @endphp   
                    <img src="{{ asset('images')}}/{{$a->foto}}" width="80%" alt="">
                @php
                }else{
                @endphp
                    <img src="{{ asset('images') }}/noprofil.jpg" width="80%" alt="">
                @php
                }
                @endphp            
            </td>
            <td>
            <form method="post" action="{{ route('anggota.destroy',$a->id) }}">
                @csrf
                @method('delete')
                <a class="btn btn-outline-info" href="{{ route('anggota.show',$a->id) }}"> Detail </a>
                <a class="btn btn-outline-warning" href="{{ route('anggota.edit',$a->id) }}"> Edit </a>
                <button class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Ingin Dihapus?')">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection