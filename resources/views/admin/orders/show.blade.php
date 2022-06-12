@extends('layouts.app')
    @section('content')
    @if ($order->user_id == $user->id)
        <div class="container">
            {{-- TABELLA CUSTOMER --}}
            <h4>Dettagli ordine:</h4>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Ordered at</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">Customer</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$order->created_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->locale('it-IT')->format('d/m/y - H:i') : '-'}}</td>
                        <td>{{ $order->street_address }}</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>

                </tbody>
            </table>


            {{-- tabella piatti --}}
            <h4>Piatti ordinati:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Quantity</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                    </tr>
                </thead>
                @foreach ($order->dishes as $dish)
                    <tbody>
                        <tr>
                            <td>{{ $dish->pivot->quantity }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>€{{ $dish->price*$dish->pivot->quantity }}</td>
                        </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <th>Total</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ $order->total_price }} €</td>
                </tr>
                </tbody>



            </table>


            <td>
                <a class="btn btn-small btn-secondary" href="{{ route('admin.orders.index', $order) }}"> &#9664;</a>
            </td>


        </div>
    @else 
        <div class="container text-center">
            <h2 >Non hai i permessi per visualizzare questa pagina!</h2>
            <a class="btn btn-small btn-secondary" href="{{ route('admin.orders.index') }}">Torna alla dashboard</a>
        </div>    
        
    @endif
@endsection
