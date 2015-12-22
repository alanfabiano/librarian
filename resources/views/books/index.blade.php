@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>Livros</h1>

	<div class="row">
		@foreach($books as $count => $book)

			@if($count%4==0)
				<div class="clearfix"></div>
				<hr />
			@endif

			<div class="col-sm-3">
				<p><strong><a class="lnk" href="{{ url('autores/'.$book->slug) }}">{{ $book->title }}</a></strong></p>
				<p><em>{{ $book->authors['name'] }}</em></p>
				<p>
					<a href="{{ url('livros/'.$book->slug) }}">
						<img class="col-sm-6" style="width:50%" src="{{ $book->book_cover }}" title="{{ $book->title }}">
					</a>
					<p>{{ substr(strip_tags($book->resume),0,180) }}</p>
				</p>
			</div>
		@endforeach
	</div>

	<div class="text-center">{!! $books->render() !!}</div>

@endsection