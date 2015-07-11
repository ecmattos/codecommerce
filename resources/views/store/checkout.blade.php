@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        @if ($cart == "empty")
            <h3>Carrinho de compras está vazio !</h3>
        @else
            <h3>Pedido de #{{ $order->id }}</h3>
            <p>Realizado com sucesso !</p>
        @endif
    </div>
@stop