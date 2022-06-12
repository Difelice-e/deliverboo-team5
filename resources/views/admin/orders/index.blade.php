@extends('layouts.app')


@section('content')

<div class="container">
    <a class="btn btn-primary" href="{{route('admin.dashboard.index')}}">Torna alla dashboard</a>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
                <th scope="col">Email</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Consegna</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{$order->created_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->locale('it-IT')->format('d/m/y - H:i') : '-'}}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->street_address }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->delivery_time ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->delivery_time)->locale('it-IT')->format('H:i') : '-'}}</td>

                    @if ($order->payment_state == 0)
                        <td>
                            <button class="rounded-pill btn btn-warning text-nowrap">Non Pagato</button>
                        </td>
                    @else
                        <td>
                            <button class=" rounded-pill btn btn-success">Pagato</button>
                        </td>
                    @endif

                    
                    @if ($order->delivered == 0)

                        <td>
                            <form action="{{route('admin.orders.update',$order)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning rounded-pill text-nowrap" onclick="return confirm('Confermi la consegna dell\'ordine?')">Non Consegnato</button>
                            </form>
                        </td>
                    @else
                        <td>
                            <button class=" rounded-pill btn btn-success">Consegnato</button>
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