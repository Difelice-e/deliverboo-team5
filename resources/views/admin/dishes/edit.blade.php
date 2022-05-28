@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{route('admin.dishes.update', $dish->id)}}" method="POST">
    @csrf
    @method('PUT')
    
    {{-- nome --}}
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" value=" {{old('name')?: $dish->name}} " name="name" id="name">
      @error('name')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- descrizione --}}
    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"> {{old('description')?: $dish->description}} </textarea>
      @error('description')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- ingredienti --}}
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3"> {{old('ingredients')?: $dish->ingredients}} </textarea>
        @error('ingredients')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>

    {{-- prezzo --}}
    <div class="mb-3">
      <label for="price" class="form-label">Prezzo</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" value=" {{old('price')?: $dish->price}} " name="price" id="price">
      @error('price')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- cover --}}
    <label class="d-block" for="cover">Cover piatto</label>
    <input class="d-block my-3" type="file" name="cover">

    {{-- visibile --}}
    <div class="form-group">
        <label for="visibility">Visibilità</label>
        <select class="form-control" name="visibility" id="visibility">
            <option {{ old('1', $dish->visibility) == '1'? 'selected' : '' }} value="1">Visibile</option>
            <option {{ old('0', $dish->visibility) == '0'? 'selected' : '' }} value="0">Non visibile</option>
        </select>
    </div>
    @error('visibility')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
    
    <button class="btn btn-primary d-inline" type="submit">Conferma Modifica</button>
    <a class="btn btn-small border rounded d-inline" type='submit' href="{{ route('admin.users.index') }}">Torna alla lista prodotti</a>

  </form>

@endsection