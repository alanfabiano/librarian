@extends('app')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h1>{{ trans('models.categories') }}</h1>
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
