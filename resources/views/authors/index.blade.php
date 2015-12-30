@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-green.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>{{ trans('messages.autores.titulo') }}</h1>

	<div class="row">
		@foreach($authors as $count => $author)
			@if($count%6==0)
				<div class="clearfix"></div>
			@endif
			<div class="col-sm-2">
				<div class="thumbnail">
					<p><a href="{{ route('authors.show',['slug' => $author->slug]) }}"><img style="width:100%" src="{{ $author->photo }}" title="{{ $author->name }}"></a></p>
					<p><strong><a class="lnk" href="{{ route('authors.show',['slug' => $author->slug]) }}">{{ $author->name }}</a></strong></p>
				</div>
			</div>
		@endforeach
	</div>

	<div class="text-center">{!! $authors->render() !!}</div>

@endsection