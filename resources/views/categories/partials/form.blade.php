<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name', 'Nome:', array('class' => 'control-label col-sm-2')) !!}
	<div class="col-lg-2">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicons glyphicons-circle-info"></i></span>
			{!! Form::text('name', null, array('class'=>'form-control', 'autofocus'=>'autofocus')) !!}
		</div>
		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Descrição:', array('class' => 'control-label col-sm-2')) !!}
	<div class="col-lg-4">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicons glyphicons-circle-info"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control']) !!}
		</div>
		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit('Confirmar', ['class'=>'btn btn-primary btn-submit form-control']) !!}
</div>