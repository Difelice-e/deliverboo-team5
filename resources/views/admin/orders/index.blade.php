@extends('layouts.app')


@section('content')

<div class="container">
    <a class="btn btn-primary" href="{{route('admin.dashboard.index')}}">Torna alla dashboard</a>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome cliente</th>
                <th scope="col">Ordinato alle</th>
                <th scope="col">Email</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Pagato</th>
                <th scope="col">Consegnato alle</th>
                <th scope="col">Consegnato</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->street_address }}</td>
                    <td>{{ $order->customer_phone }}</td>

                    @if ($order->payment_state == 0)
                        <td>
                            <span class="rounded-pill bg-warning p-2 text-nowrap">Non Pagato</span>
                        </td>
                    @else
                        <td>
                            <span class=" rounded-pill bg-success p-2">Pagato</span>
                        </td>
                    @endif

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
                    
                    @if (!$order->delivered)
                        <td>
                            <form action="{{route('admin.orders.update',$order)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-small w-100 btn-primary" onclick="return confirm('Confermi la consegna dell\'ordine?')">Consegnato</button>
                            </form>
                        </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection