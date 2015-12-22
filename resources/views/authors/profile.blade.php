@extends('app')

@section('head')
	<link href="{{ asset('/css/custom-green.css') }}" rel="stylesheet">
@endsection

@section('content')

	<h1>Autor: <em>{{ $authors->name }}</em></h1>

	<p>{{ $authors->biography }}</p>

	<h2>Obras do Autor:</h2>
	<div class="row">
		@foreach($authors->books as $count => $book)
			@if($count%6==0)
				<div class="clearfix"></div>
			@endif
			<div class="col-sm-2">
				<p>
					<a href="{{ url('livros/'.$book->slug) }}"><img style="width:100%" src="{{ $book->book_cover }}" title="{{ $book->title }}"></a>
				</p>
				<p>
					<a class="lnk" href="{{ url('livros/'.$book->slug) }}"><strong>{{ $book->title }}</strong></a>
				</p>
			</div>
		@endforeach
	</div>

@endsection