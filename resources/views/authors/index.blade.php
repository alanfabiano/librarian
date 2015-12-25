@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-green.css') }}" rel="stylesheet">
@endsection


@section('content')

	<h1>Autores</h1>

	<div class="row">
		@foreach($authors as $count => $author)
			@if($count%6==0)
				<div class="clearfix"></div>
			@endif
			<div class="col-sm-2">
				<div class="thumbnail">
					<p><a href="{{ url('autores/'.$author->slug) }}"><img style="width:100%" src="{{ $author->photo }}" title="{{ $author->name }}"></a></p>
					<p><strong><a class="lnk" href="{{ url('autores/'.$author->slug) }}">{{ $author->name }}</a></strong></p>
				</div>
			</div>
		@endforeach
	</div>

	<div class="text-center">{!! $authors->render() !!}</div>

@endsection