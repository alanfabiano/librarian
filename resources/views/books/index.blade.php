@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')
	<div class="row">

		<div class="col-sm-9">	
			<h1>{{ trans('messages.livros.titulo') }}</h1>
			<div class="row">
				@foreach($books as $count => $book)

					@if($count%4==0)
						<div class="clearfix"></div>
						<hr />
					@endif

					<div class="col-sm-3">
						<p><strong><a class="lnk" href="{{ route('books.show',['slug' => $book->slug]) }}">{{ $book->title }}</a></strong></p>
						<p><em><a class="lnk-green" href="{{ route('books.show', ['slug' => $book->slug]) }}">{{ $book->authors['name'] }}</em></p>
						<p>
							<a href="{{ route('books.show', ['slug' => $book->slug]) }}">
								<img class="col-sm-6" style="width:50%" src="{{ $book->book_cover }}" title="{{ $book->title }}">
							</a>
							<p>{{ substr(strip_tags($book->resume),0,180) }}</p>
						</p>
					</div>
				@endforeach
			</div>
			<div class="text-center">{!! $books->render() !!}</div>
		</div>

		<div class="col-sm-3">
			<h2>{{ trans('messages.livros.categorias') }}</h2>
			<ul class="categorias_livros">
				@foreach($categories as $category)
					<li><a href="{{ route('books.categorias',['categoria' => $category->slug]) }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection