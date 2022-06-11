@extends('layouts.app')


@section('content')

<div class="container">
    {{-- pulsante create  --}}
    <a class="btn btn-primary" href="{{route('admin.dishes.create')}}">Aggiungi piatto</a>
    <a class="btn btn-primary" href="{{route('admin.dashboard.index')}}">Torna alla dashboard</a>

    {{-- tabella piatti  --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cover</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Visibilità</th>
                <th scope="col">Prezzo</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td>{{ $dish->id }}</td>
                    <td>{{ $dish->name }}</td>
                    <td>
                        @if ($dish->cover)
                            <img style="width:100px; height:80px" src="{{asset($dish->cover)}}" alt="">
                        @else 
                            <img style="width:100px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiyxFMYu0x-npJwaXaDUB6gi8DePtyLRxx-w&usqp=CAU" alt="">
                        @endif
                    </td>
                    <td>{{ $dish->ingredients }}</td>
                    <td>{{ $dish->description }}</td>
                    @if ($dish->visible == 0)
                        <td>
                            <span class="rounded-pill bg-warning p-2 text-nowrap">Non Visibile</span>
                        </td>
                    @else
                        <td>
                            <span class=" rounded-pill bg-success p-2 text-nowrap">Visibile</span>
                        </td>
                    @endif
                    <td>€{{ $dish->price }}</td>

                    <td>
                        <a class="btn btn-small btn-secondary" href="{{route('admin.dishes.edit',$dish)}}">Modifica</a>
                    </td>
                    <td>
                        <form action="{{route('admin.dishes.destroy',$dish)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-small w-100 btn-danger" onclick="return confirm('Sei sicuro di voler rimuovere questo piatto dal menù definitivamente?')">Cancella</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection