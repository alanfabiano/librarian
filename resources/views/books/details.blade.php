@extends('app')
@section('head_tags')
	<title>Librarian</title>
@endsection
@section('content')

	<h1>{{ trans('messages.livros_detalhes.titulo') }}: <em>{{ $book->title }}</em></h1>

	<p><strong>{{ trans('messages.livros_detalhes.autor') }}:</strong> <em><a class="lnk-green" href="{{ route('authors.show', ['slug' => $book->authors['slug']]) }}">{{ $book->authors['name'] }}</a></em></p>
	<p><strong>{{ trans('messages.livros_detalhes.categoria') }}:</strong> <em><a class="lnk-purple" href="{{ route('books.categoria', ['categorias' => $book->category['slug']]) }}">
	{{ $book->category['name'] }}</a></em></p>

	<div class="row">
		<div class="col-sm-3">
			<img src="{{ $book->book_cover }}">
		</div>
		{!! $book->resume !!}
	</div>

@endsection
