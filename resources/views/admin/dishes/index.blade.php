@extends('layouts.app')


@section('content')

<div class="container">
    {{-- pulsante create  --}}
    <a class="btn btn-primary" href="{{route('admin.dishes.create')}}">Aggiungi piatto</a>

    {{-- tabella piatti  --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cover</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Visibile</th>
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
                    <td><img style="width:100px" src="{{asset('storage/' . $dish->cover)}}" alt=""></td>
                    <td>{{ $dish->ingredients }}</td>
                    <td>{{ $dish->description }}</td>
                    <td>{{ $dish->visible }}</td>
                    <td>€{{ $dish->price }}</td>

                    <td>
                        <a class="btn btn-small btn-secondary" href="{{route('admin.dishes.edit',$dish)}}">Modifica</a>
                    </td>
                    <td>
                        <form action="{{route('admin.dishes.destroy',$dish)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-small w-100 btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection