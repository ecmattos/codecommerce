@extends('app')

@section('content')
	<div class="container"> 
		<h3>Imagens de {{ $product->name }}</h3>
		<a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="btn btn-default"><i class='glyphicon glyphicon-file'></i></a>
		<table class="table"> 
			<thead>
				<tr>
					<th>Imagens</th>
					<th>Extensões</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($product->images as $image)
			        <tr>
			        	<td><img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80"></td>
			        	<td width='20%'>{{ $image->extension }}</td>
			        	<td width='1%'><a href="{{ route('products.images.destroy', ['id' => $image->id]) }}"><i class='glyphicon glyphicon-trash'></i></a></td>
			        </tr>
			    @endforeach
			</tbody>
		</table>

		<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
	</div>
@endsection