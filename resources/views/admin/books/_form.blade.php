<div class="form-group {{ $errors->first('title','has-error') }}">
	{!! $errors->first('title','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Title', 'Title:') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('author','has-error') }}">
	{!! $errors->first('author_id','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('author_id', 'Author:') !!}
	{!! Form::select('author_id', $authors, null, ['class' => 'form-control', 'placeholder' => 'Selecione um Autor']) !!}
</div>

<div class="form-group {{ $errors->first('category','has-error') }}">
	{!! $errors->first('category_id','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('category_id', 'Category:') !!}
	{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma Categoria']) !!}
</div>

<div class="form-group {{ $errors->first('book_cover','has-error') }}">
	{!! $errors->first('book_cover','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Book Cover', 'Book Cover:') !!}
	{!! Form::input('file', 'book_cover', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->first('resume','has-error') }}">
	{!! $errors->first('resume','<div class="text-danger pull-right">:message</div>') !!}
	{!! Form::label('Resume', 'Resume') !!}
	{!! Form::textarea('resume', null, ['class' => 'form-control'] ) !!}
</div>