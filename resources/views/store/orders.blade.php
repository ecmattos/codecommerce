@extends('store.store')

@section('content')
    <div class="col-sm-9 padding-right">
        <h3>Meus pedidos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach($order->items as $item)
                                <li>{{ $item->product->id }} - {{ $item->product->name }} - Qte: {{ $item->qtd }}</li>
                            @endforeach
                        </td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop