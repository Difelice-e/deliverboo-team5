@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex">
        <img src="{{$user->cover}}" alt="">
        <h1>{{$user->business_name}}</h1>
    </div>
    <p>Email: {{$user->email}}</p>
    <p>Partita IVA: IT{{$user->vat_number}}</p>
    <p>Indirizzo: {{$user->street_address}}</p>
    <p>Numero Telefono: {{$user->phone_number}}</p>
    <p>Data Iscrizione: {{$user->created_at}}</p>
    <div class="d-flex">
        <a href={{route('admin.dishes.index')}} class="btn btn-primary mr-3">Menù</a>
        <a class="btn btn-primary">Ordini</a>
    </div>
</div>



@endsection