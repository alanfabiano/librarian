@extends('app')


@section('head')
	<link href="{{ asset('/css/custom-purple.css') }}" rel="stylesheet">
@endsection


@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h1>{{ trans('messages.livros_categoria.categorias') }}</h1>
			<div class="row">
				<ul>
					@foreach($Categories as $category)
						<li>
							<a class="lnk-purple" href="{{ route('books.category', ['categoria' => $category->slug]) }}">{{ $category->name }}</a> <small>({{ $category->CountBooks() }})</small>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection
