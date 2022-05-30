@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex mb-3">
        @if ($user->cover)
            <img style="width:200px" src="{{asset('storage/' . $user->cover)}}" alt="">
        @else 
            <img style="width:200px" src="https://i0.wp.com/blog.glovoapp.com/wp-content/uploads/2020/10/Repartidor-Glovo.png?ssl=1" alt="">
        @endif
        <h1>{{$user->business_name}}</h1>
    </div>
    <p>
        @foreach ($user->tipologies as $tipology)
            <span class="bg-info border border-primay rounded-pill p-1">{{$tipology->name}}</span>
        @endforeach
    </p>
    <p>Email: {{$user->email}}</p>
    <p>Partita IVA: IT{{$user->vat_number}}</p>
    <p>Indirizzo: {{$user->street_address}}</p>
    <p>Numero Telefono: {{$user->phone_number}}</p>
    <p>Data Iscrizione: {{$user->created_at}}</p>
    <div class="d-flex">
        <a href={{route('admin.dishes.index')}} class="btn btn-primary mr-3">Menù</a>
        <a href={{route('admin.orders.index')}} class="btn btn-primary">Ordini</a>
    </div>
</div>



@endsection