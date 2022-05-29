@extends('layouts.app')
@section('content')

<div class="container">
    
    <table class="table">

        {{-- TABELLA CUSTOMER  --}}

        <thead>
            <tr>
                <th scope="col">Ordered at</th>
                <th scope="col">Delivery Address</th>
                <th scope="col">Customer</th>
                
            </tr>
        </thead>
        <tbody>
            
                <tr>  
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->street_address}}</td>
                    <td>{{$order->customer_name}}</td>
                </tr>
           
        </tbody>
    </table>


    {{-- tabella piatti  --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Quantity</th>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
            </tr>
        </thead>
        @foreach($order->dishes as $dish)
        <tbody>
                <tr>
                    <td>{{ $dish->pivot->quantity }}</td>
                    <td>{{ $dish->name }}</td>
                    <td>€{{ $dish->price }}</td>
                </tr>
        </tbody>
        @endforeach

    </table>
      

    <td>
        <a class="btn btn-small btn-secondary" href="{{route('admin.orders.index',$order)}}">Index</a>
    </td>
 
    
</div>


@endsection

