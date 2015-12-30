@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')
	<div class="row">

		<div class="col-sm-9">	
			<h1>{{ trans('messages.livros_categoria.titulo') }}<br /><small>{{ trans('messages.livros_categoria.categoria') }}: {{ $Category->name }}</small></h1>
			<div class="row">
				@foreach($books as $count => $book)

					@if($count%4==0)
						<div class="clearfix"></div>
						<hr />
					@endif

					<div class="col-sm-3">
						<p class="text-center">
							<a href="{{ route('books.show', ['slug' => $book->slug]) }}">
								<img style="width:50%" src="{{ $book->book_cover }}" title="{{ $book->title }}" />
							</a>
						</p>
						<p class="text-center"><strong><a class="lnk" href="{{ route('books.show',['slug' => $book->slug]) }}">{{ $book->title }}</a></strong></p>
						<p class="text-center"><em><a class="lnk-green" href="{{ route('books.show', ['slug' => $book->slug]) }}">{{ $book->authors['name'] }}</a></em></p>
					</div>
				@endforeach
			</div>
			<div class="text-center">{!! $books->render() !!}</div>
		</div>

		<div class="col-sm-3">
			<h2>{{ trans('messages.livros_categoria.categorias') }}</h2>
			<ul class="categorias_livros">
				@foreach($categories as $category)
					<li><a href="{{ url('livros/categoria/'.$category->slug) }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection