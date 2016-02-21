<div class="form-group {{ $errors->first('name','has-error') }}">
	{!! $errors->first('name','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Name', 'Name:') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('photo','has-error') }}">
	{!! $errors->first('photo','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Photo', 'Photo:') !!}
	{!! Form::input('file', 'photo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('resume','has-error') }}">
	{!! $errors->first('biography','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Biography', 'Biography') !!}
	{!! Form::textarea('biography', null, ['class' => 'form-control'] ) !!}
</div>