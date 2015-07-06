@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produtos</h3>
		<a href="{{ route('products.create') }}" class="btn btn-default"><i class='glyphicon glyphicon-file'></i></a>
		<table class="table"> 
			<thead>
				<tr>
					<th>#</th>
					<th>Images</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th class="text-right">R$ Unit</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
			        <tr>
			        	<td width='1%'><a href="{{ route('products.edit', ['id'=>$product->id]) }}"><i class='glyphicon glyphicon-edit'></i></a></td>
			        	<td width='4%' class="text-center"><a href="{{ route('products.images', ['id'=>$product->id]) }}"><i class='glyphicon glyphicon-camera'></i></a></td>
			        	<td width='20%'>{{ $product->name }}</td>
			        	<td>{{ str_limit($product->description, $limit = 100, $end = '...') }}</td>
			        	<td>{{ $product->category->name }}</td>
			        	<td class="text-right">{{ number_format($product->price, '2',',','.') }}</td>
			        	<td width='1%'><a href="{{ route('products.destroy', ['id'=>$product->id]) }}"><i class='glyphicon glyphicon-trash'></i></a></td>
			        </tr>
			    @endforeach
			</tbody>
		</table>

		{!! $products->render() !!}
	</div>
@endsection