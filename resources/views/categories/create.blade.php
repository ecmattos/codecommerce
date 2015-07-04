@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produtos: categorias - Inclusão</h3>
		<a href="{{ route('categories') }}" class="btn btn-default"><i class='glyphicon glyphicon-list'></i></a>

		{!! Form::open(['url'=>'categories', 'class'=>'form-horizontal', 'role'=>'form']) !!}
			
			@include('categories.partials.form')
		
		{!! Form::close() !!}
	</div>
@endsection