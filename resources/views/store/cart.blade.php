@extends('store.store')

@section('content')
    <section id="cart_items">
    	<div class="container">
    		<div class="table-responsive cart_info">
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr class="cart_menu">
	    					<td class="image">Item</td>
	    					<td class="description">Descrição</td>
	    					<td class="price text-right">Valor</td>
	    					<td class="price text-right">Qte</td>
	    					<td class="price text-right">Total item</td>
	    					<td class="price"></td>
	    				</tr>
	    			</thead>

	    			<tbody>
	    				@forelse($cart->all() as $k=>$item)
		    				<tr>
		    					<td class="cart_product">
		    						<a href="{{ route('store.product', ['id' => $k]) }}">
		    							Imagem
		    						</a>
		    					</td>
		    					<td class="cart_description">
		    						<h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
		    						<p>Código: {{ $k }} </p>
		    					</td>
		    					<td class="cart_price text-right">
		    						R$ {{ number_format($item['price'], 2,",",".") }}
		    					</td>
		    					<td class="cart_quantity text-right">
		    						{{ $item['qtd'] }}
		    					</td>
		    					<td class="cart_total text-right">
		    						<p class="cart_total_price">
		    						R$ {{ number_format(($item['qtd'] * $item['price']), 2,",",".") }}
		    					</td>
		    					<td class="cart_delete text-center">
		    						<a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete"><i class='glyphicon glyphicon-trash'></i></a>
		    					</td>
		    				</tr>
		    			@empty
		    				<tr>
		    					<td class="text-center" colspan="6">
		    						<h4>Nenhum produto adicionado</h4>
		    					</td>
		    				</tr>
		    			@endforelse
		    				<tr class="cart_menu">
		    					<td colspan="6">
		    						<div class="pull-right">
		    							<span>
		    								TOTAL: R$ {{ number_format($cart->getTotal(), 2,",",".") }}
		    							</span>
		    							<a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar conta</a>
		    						</div>
		    					</td>
		    				<tr>
	    			</tbody>
	    		</table>
    		</div>
    	</div>
    </section>
@stop


