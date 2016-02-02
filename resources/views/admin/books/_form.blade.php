<div class="form-group {{ $errors->first('title','has-error') }}">
	{!! $errors->first('title','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Title', 'Title:') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('author','has-error') }}">
	{!! $errors->first('author','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Author', 'Author:') !!}
	{!! Form::select('author', $authors, null, ['class' => 'form-control', 'placeholder' => 'Selecione um Autor']) !!}
</div>

<div class="form-group {{ $errors->first('category','has-error') }}">
	{!! $errors->first('category','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Category', 'Category:') !!}
	{!! Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma Categoria']) !!}
</div>

<div class="form-group {{ $errors->first('book_cover','has-error') }}">
	{!! $errors->first('book_cover','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('book_cover', 'Book Cover:') !!}
	{!! Form::input('file', 'book_cover', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('resume','has-error') }}">
	{!! $errors->first('resume','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Resume', 'Resume') !!}
	{!! Form::textarea('resume', null, ['class' => 'form-control'] ) !!}
</div>