@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>Livro: <em>{{ $book->title }}</em></h1>

	<p><strong>Autor:</strong> <em>{{ $book->authors['name'] }}</em></p>

	<div class="row">
		<div class="col-sm-3">
			<img src="{{ $book->book_cover }}">
		</div>
		{!! $book->resume !!}
	</div>

@endsection