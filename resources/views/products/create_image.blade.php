@extends('app')

@section('content')
	<div class="container"> 
		<h3>Produtos: Imagem - Inclusão</h3>
		<a href="{{ route('products') }}" class="btn btn-default"><i class='glyphicon glyphicon-list'></i></a>

		{!! Form::open(['route' => ['products.images.store', $product->id], 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
			
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				{!! Form::label('image', 'Imagem:', ['class'=>'control-label col-sm-2']) !!}
				<div class="col-lg-3">
					<div class="input-group">
						{!! Form::file('image', null, array('class' => 'form-control', 'autofocus'=>'autofocus')) !!}
					</div>
					{!! $errors->first('image', '<span class="help-block">:message</span>') !!}
				</div>
			</div>
			
			<div class="form-group">
				{!! Form::submit('Enviar', ['class'=>'btn btn-primary btn-submit form-control']) !!}
			</div>
			
		{!! Form::close() !!}
	</div>
@endsection