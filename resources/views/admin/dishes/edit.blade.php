@extends('layouts.app')

@section('content')
  @if ($dish->user_id == $user->id)
    <div class="container">
      <form action="{{route('admin.dishes.update', $dish->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        {{-- nome --}}
        <div class="mb-3">
          <label for="name" class="form-label">Nome*</label>
          <input required type="text" class="form-control @error('name') is-invalid @enderror" value=" {{old('name')?: $dish->name}} " name="name" id="name">
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
          <label for="ingredients" class="form-label">Ingredienti*</label>
          <textarea required class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3"> {{old('ingredients')?: $dish->ingredients}} </textarea>
          @error('ingredients')
              <div class="invalid-feedback"> {{$message}} </div>
          @enderror
        </div>

        {{-- prezzo --}}
        <div class="mb-3">
          <label for="price" class="form-label">Prezzo*</label>
          <input required type="number" step=".01" min="0.01" max="999.99" class="form-control @error('price') is-invalid @enderror" value="{{old('price')?: (int)$dish->price}}" name="price" id="price">
          @error('price')
              <div class="invalid-feedback"> {{$message}} </div>
          @enderror
        </div>

        {{-- cover --}}
        <div class="mb-3">
          <label class="d-block" for="cover">Cover piatto</label>
          <input class="d-block my-3 @error('cover') is-invalid @enderror" accept=".jpg, .jpeg, .gif, .png, .svg" type="file" name="cover" id="cover">
          @error('cover')
              <div class="invalid-feedback"> {{$message}} </div>
          @enderror
        </div>
        

        {{-- visibile --}}
        <div class="form-group">
          <label for="visible">Visibilità</label>
            <select class="form-control" name="visible" id="visible">
              <option {{ old('1', $dish->visible) == '1' ? 'selected' : '' }} value="1">Visibile</option>
              <option {{ old('0', $dish->visible) == '0' ? 'selected' : '' }} value="0">Non visibile</option>
            </select>
        </div>
        @error('visible')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        
        <button class="btn btn-primary d-inline" type="submit">Conferma Modifica</button>
        <a class="btn btn-small border rounded d-inline" type='submit' href="{{ route('admin.dishes.index') }}">Torna alla lista prodotti</a>

      </form>
    </div>
  @else
    <div class="container text-center">
      <h2 >Non hai i permessi per visualizzare questa pagina!</h2>
      <a class="btn btn-small btn-secondary" href="{{ route('admin.dishes.index') }}">Torna alla dashboard</a>
    </div>  
  @endif
@endsection