@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>Livro: <em>{{ $book->title }}</em></h1>

	<p><strong>Autor:</strong> <em><a class="lnk-green" href="{{ url('autores/'.$book->authors['slug']) }}">{{ $book->authors['name'] }}</a></em></p>
	<p><strong>Categoria:</strong> <em>{{ $book->category['name'] }}</em></p>

	<div class="row">
		<div class="col-sm-3">
			<img src="{{ $book->book_cover }}">
		</div>
		{!! $book->resume !!}
	</div>

@endsection