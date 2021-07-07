@extends('layout')
@section('content')
<div class="container d-flex justify-content-center">
<div class="card  mt-2 mb-5" style="width: 40%;">
    @foreach($ar_anggota as $a)
        @php
        if(!empty($a->foto)){
        @endphp   
            <img class="card-img-top " src="{{ asset('images')}}/{{$a->foto}}" width="40%" alt="">
        @php
        }else{
        @endphp
            <img class="card-img-top " src="{{ asset('images') }}/noprofil.jpg" width="40%" alt="">
        @php
        }
        @endphp
  <div class="card-body">
    <h1>{{ $a->nama }}</h1>
    <p>
    Email : {{ $a-> email}} <br>
    No. HP : {{ $a-> hp}} <br>
    </p>
    @endforeach  
  </div>
  <a class="btn btn-outline-info" href="{{ url('/anggota')}}"> Kembali </a>
</div>
</div>
@endsection
