@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                            @csrf

                            {{-- business name --}}
                            <div class="form-group row">
                                <label for="business_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività*') }}</label>

                                <div class="col-md-6">
                                    <input id="business_name" type="text"
                                        class="form-control @error('business_name') is-invalid @enderror"
                                        name="business_name" value="{{ old('business_name') }}" required
                                        autocomplete="business_name" autofocus>

                                    @error('business_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" minlength="8"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password confirm --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input onchange="onChange()" id="password-confirm"  type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                        <div id="allert-password"></div>
                                </div>
                               
                            </div>
                           

                            {{-- vat number --}}
                            <div class="form-group row">
                                <label for="vat_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA*') }}</label>

                                <div class="col-md-6">
                                    <input id="vat_number" type="number" min="10000000000" max="99999999999"
                                        oninvalid="this.setCustomValidity('Inserisci una partita iva valida di 11 cifre')"
                                        oninput="this.setCustomValidity('')"
                                        class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- street address --}}
                            <div class="form-group row">
                                <label for="street_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="street_address" type="text"
                                        class="form-control @error('street_address') is-invalid @enderror"
                                        name="street_address" value="{{ old('street_address') }}" required
                                        autocomplete="street_address" autofocus>

                                    @error('street_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- phone number --}}
                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefono*') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number" min="100000" max="9999999999"
                                        oninvalid="this.setCustomValidity('Inserisci un numero di telefono valido tra 6 e 10 cifre')"
                                        oninput="this.setCustomValidity('')"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- cover --}}
                            <div class="form-group row">
                                <label for="cover"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine Profilo*') }}</label>

                                <div class="col-md-6">
                                    <input id="cover" type="file" accept=".jpg, .jpeg, .gif, .png, .svg"
                                        class="@error('cover') is-invalid @enderror" name="cover"
                                        value="{{ old('cover') }}" required autocomplete="cover" autofocus>

                                    @error('cover')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- tipologies --}}

                            <div class="form-group form-check row text-center">
                                <label for="tipology"
                                    class="col-form-label text-md-right">{{ __('Tipologie*') }}</label>
                                <div class="row">
                                    @foreach ($tipologies as $tipology)
                                    <div class="col-3 text-center">
                                        <input  required type="checkbox" class="form-check-input"
                                            value="{{ $tipology->id }}"
                                            {{ is_array(old('tipologies')) && in_array($tipology->id, old('tipologies')) ? ' checked' : '' }}
                                            oninvalid="this.setCustomValidity('Inserisci almeno una tipologia')"
                                            oninput="this.setCustomValidity('')"
                                            name="tipologies[]" id="tipology-{{ $tipology->id }}">
                                        <label class="form-check-label" for="tipologies-{{ $tipology->id }}">{{ $tipology->name }}</label>
                                    </div>
                                @endforeach
                                @error('tipologies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                

                            </div>


                            {{-- submit button --}}
                            <div class="form-group row mb-5 text-center">
                                <div class="col-12">
                                    <button onclick="checkout()" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="text-center text-secondary">
                                <p>I campi con * sono obbligatori</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onChange() {
            const password = document.getElementById('password');
            const confirm = document.getElementById('password-confirm');
            const allertPassword = document.getElementById('allert-password');
       

            if (confirm.value !== password.value) {
                // creare div errore 
                allertPassword.innerHTML = `<p class="text-danger"> * Le password non corrispondono </p>`;
                confirm.value = '';
            }
            else if ( (confirm.value == password.value)){
                allertPassword.innerHTML = `<p class="text-success"> * Le password corrispondono </p>`;

            }
        }

        function checkout() {
            const checkBoxesChecked = document.querySelectorAll('input[type="checkbox"]:checked');
            const checkBoxes = document.querySelectorAll('input[type="checkbox"]');

            for (let index = 0; index < checkBoxes.length; index++) {
                const e = checkBoxes[index];
                if (checkBoxesChecked.length > 0) {
                    e.removeAttribute('required')
                } else {
                    e.setAttribute('required', '')
                }
            }
        }
    </script>
@endsection
