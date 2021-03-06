@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produto - Alteração</h3>
		<a href="{{ route('products') }}" class="btn btn-default"><i class='glyphicon glyphicon-list'></i></a>
		
		{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}
			
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('name', 'Nome:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						{!! Form::text('name', $product->name, array('class' => 'form-control', 'autofocus'=>'autofocus')) !!}
					</div>
					{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				{!! Form::label('description', 'Descrição:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-question-mark"></i></span>
						{!! Form::text('description', $product->description, ['class'=>'form-control']) !!}
					</div>
					{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('category_id', 'Categoria:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
						{!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
					</div>
				</div>
			</div>

			<div class="form-group  {{ $errors->has('price') ? 'has-error' : '' }}">
				{!! Form::label('price', 'Valor Unitário (R$):', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
						{!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
					</div>
					{!! $errors->first('price', '<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group  {{ $errors->has('featured') ? 'has-error' : '' }}">
				{!! Form::label('featured', 'Featured:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-2">
					<div class="input-group">
						{!! Form::checkbox('featured', $product->featured, ['class'=>'form-control']) !!}
					</div>
					{!! $errors->first('featured', '<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group  {{ $errors->has('recommended') ? 'has-error' : '' }}">
				{!! Form::label('recommended', 'Recomendado:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-2">
					<div class="input-group">
						{!! Form::checkbox('recommended', $product->recommended, ['class'=>'form-control']) !!}
					</div>
					{!! $errors->first('recommended', '<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::submit('Confirmar', ['class'=>'btn btn-primary btn-submit form-control']) !!}
			</div>

		{!! Form::close() !!}
	</div>
@endsection