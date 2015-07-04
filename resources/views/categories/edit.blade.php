@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produtos: categorias - Alteração</h3>
		<a href="{{ route('categories') }}" class="btn btn-default"><i class='glyphicon glyphicon-list'></i></a>

		{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}
			
			@include('categories.partials.form')
		
		{!! Form::close() !!}
	</div>
@endsection