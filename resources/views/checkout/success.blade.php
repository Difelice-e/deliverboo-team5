@extends('layouts.app')

@section('content')
<div class="success-page">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 text-center py-5">
                <h1>Pagamento di {{$order->total_price}}€ avventuo con successo!</h1>
                <p>Riceverai una mail di conferma del tuo ordine al ristorante {{$ristoratore->business_name}}</p>
                <button class="btn btn-success">
                    <a href="/">Torna alla home page!</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection