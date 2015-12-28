@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-red.css') }}" rel="stylesheet">
@endsection


@section('content')
	<div class="row">

		<div class="col-sm-9">	
			<h1>Livros<br /><small>Categoria: {{ $Category->name }}</small></h1>
			<div class="row">
				@foreach($books as $count => $book)

					@if($count%4==0)
						<div class="clearfix"></div>
						<hr />
					@endif

					<div class="col-sm-3">
						<p><strong><a class="lnk" href="{{ url('livros/'.$book->slug) }}">{{ $book->title }}</a></strong></p>
						<p><em><a class="lnk-green" href="{{ url('autores/'.$book->authors['slug']) }}">{{ $book->authors['name'] }}</a></em></p>
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
		</div>

		<div class="col-sm-3">
			<h2>Categorias</h2>
			<ul class="categorias_livros">
				@foreach($categories as $category)
					<li><a href="{{ url('livros/categoria/'.$category->slug) }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection