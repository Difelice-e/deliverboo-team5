@extends('layouts.app')


@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
           
                <th scope="col">Customer</th>
                <th scope="col">Ordered at</th>
                <th scope="col">Email</th>
                <th scope="col">Addres</th>
                <th scope="col">Phone</th>
                <th scope="col">Delivery at</th>
                <th scope="col">Delivered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->street_address }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->delivery_time }}</td>
                    @if ($order->delivered == 0)
                    <td>

                        <span class="rounded-pill bg-warning p-2">Undelivered</span>
             
                          
                     
                    </td>
                    @else
                    <td>

                        <span class=" rounded-pill bg-success p-2">Delivered</span>
                    </td>
                    @endif
                    <td>
                        <a class="btn btn-small btn-secondary" href="{{route('admin.orders.show',$order)}}">Apri</a>
                    </td>
                 


                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection