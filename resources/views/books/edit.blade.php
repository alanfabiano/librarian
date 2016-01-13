@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')
	<div class="row">

		<div class="col-sm-12">
			<h1>{{ trans('messages.livros.titulo') }}</h1>
			<div class="row">
        <div class="col-sm-12">
          {!! Form::open(['method'=>'POST']) !!}
          <div class="form-group">
            {!! Form::label('title', trans('messages.livros.titulo').':') !!}
            {!! Form::input('text', 'title', $book->title, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Author', trans('messages.livros.titulo').':') !!}
            {!! Form::input('text', 'author', $book->author, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('category', trans('messages.livros.titulo').':') !!}
            {!! Form::input('text', 'category', $book->category, ['class' => 'form-control']) !!}
          </div>

          {!! Form::submit() !!}
          {!! Form::close() !!}
        </div>
      </div>
		</div>
	</div>

@endsection
