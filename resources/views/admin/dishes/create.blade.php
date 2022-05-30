@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    {{-- nome --}}
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="name">
      @error('name')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- descrizione --}}
    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{old('description')}}</textarea>
      @error('description')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- ingredienti --}}
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3">{{old('ingredients')}}</textarea>
        @error('ingredients')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>

    {{-- prezzo --}}
    <div class="mb-3">
      <label for="price" class="form-label">Prezzo</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" name="price" id="price">
      @error('price')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- cover --}}
    <div class="mb-3">
      <label class="d-block" for="cover">Cover piatto</label>
      <input class="@error('cover') is-invalid @enderror" type="file" name="cover" id="cover" value="{{old('cover')}}">
      @error('cover')
          <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>
    
    {{-- visibile --}}
    <div class="form-group">
        <label for="visible">Visibilità</label>
        <select class="form-control" name="visible" id="visible" value="{{old('visible')}}">
            <option {{ old('1') == '1'? 'selected' : '' }} value="1">Visibile</option>
            <option {{ old('0') == '0'? 'selected' : '' }} value="0">Non visibile</option>
        </select>
        @error('visible')
          <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    
    
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>

@endsection