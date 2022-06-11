@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="d-flex flex-column justify-content-center align-items-center col-12 col-md-6">
            <figure class="col-12 m-0">
                @if ($user->cover)
                <img class="rounded frame" width="100%" height='100%' src="{{asset($user->cover)}}" alt="">
                @else
                <img class="rounded" style="width:200px" src="https://i0.wp.com/blog.glovoapp.com/wp-content/uploads/2020/10/Repartidor-Glovo.png?ssl=1" alt="">
                @endif
            </figure>
        </div>
        <div class="d-flex flex-column col-12 col-md-6">
            <h1>{{$user->business_name}}</h1>
            <p>
                @foreach ($user->tipologies as $tipology)
                <span class="text-center px-3 py-1 pill-color rounded-pill">{{$tipology->name}}</span>
                @endforeach
            </p>
            <p class="d-flex flex-column">
            <h5>
                Email
            </h5>
            <span>
                <img width="20px" height='20px' src="https://cdn.icon-icons.com/icons2/614/PNG/512/email-envelope-outline-shape-with-rounded-corners_icon-icons.com_56530.png" alt="">

                {{$user->email}}
            </span>
            </p>
            <p class="d-flex flex-column">
            <h5>
                Partita IVA
            </h5>
            <span>
                <img width="20px" height='20px' src="https://cdn-icons-png.flaticon.com/512/2991/2991112.png" alt="">

                IT{{$user->vat_number}}
            </span>
            </p>
            <p class="d-flex flex-column">
            <h5>
                Indirizzo
            </h5>
            <span>
                <img width="20px" height='20px' src="https://cdn-icons.flaticon.com/png/512/2697/premium/2697390.png?token=exp=1654971194~hmac=f4eda86cee0c58808ca039b658f250fa" alt="">

                {{$user->street_address}}
            </span>
            </p>
            <p class="d-flex flex-column">
            <h5>
                Numero Telefono
            </h5>
            <span>
                <img width="20px" height='20px' src="https://cdn-icons-png.flaticon.com/512/25/25453.png" alt="">

                {{$user->phone_number}}
            </span>
            </p>
            <p class="d-flex flex-column">
            <h5>
                Data Iscrizione
            </h5>
            <span>
                <img width="20px" height='20px' src="https://cdn-icons.flaticon.com/png/512/2321/premium/2321232.png?token=exp=1654971767~hmac=b280bf65187d5e71f49d652e25b6feb6" alt="">

                {{$user->created_at}}
            </span>
            </p>
            <div class="d-flex">
                <a href={{route('admin.dishes.index')}} class="btn bg-greedgc text-white mr-3">Menù</a>
                <a href={{route('admin.orders.index')}} class="btn bg-greedgc text-white">Ordini</a>
            </div>
        </div>
    </div>
</div>



@endsection