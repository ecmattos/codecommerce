@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produtos: Categorias</h3>
		<a href="{{ route('categories.create') }}" class="btn btn-default"><i class="glyphicon glyphicon-file"></i></a>
		<table class="table"> 
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
			        <tr>
			        	<td width='1%'><a href="{{ route('categories.edit', ['id'=>$category->id]) }}"><i class="glyphicon glyphicon-edit"></i></a></td>
			        	<td width='4%'>{{ $category->id }}</td>
			        	<td width='24%'>{{ $category->name }}</td>
			        	<td>{{ $category->description }}</td>
			        	<td width='1%'><a href="{{ route('categories.destroy', ['id'=>$category->id]) }}"><i class="glyphicon glyphicon-trash danger"></i></a></td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection