@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>Livro: <em>{{ $book->title }}</em></h1>

	<p><strong>Autor:</strong> <em><a class="lnk-green" href="{{ route('authors.show', ['slug' => $book->authors['slug']]) }}">{{ $book->authors['name'] }}</a></em></p>
	<p><strong>Categoria:</strong> <em><a class="lnk-purple" href="{{ route('books.categoria', ['categorias' => $book->category['slug']]) }}">
	{{ $book->category['name'] }}</a></em></p>

	<div class="row">
		<div class="col-sm-3">
			<img src="{{ $book->book_cover }}">
		</div>
		{!! $book->resume !!}
	</div>

@endsection