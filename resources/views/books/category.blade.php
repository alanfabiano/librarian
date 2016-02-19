@extends('app')
@section('head_tags')
	<title>Librarian</title>
@endsection
@section('content')
	<div class="row">

		<div class="col-sm-9">
			<h1>{{ trans('models.books') }}<br /><small>{{ trans('models.category') }}: {{ $Category->name }}</small></h1>
			<div class="row">
				@foreach($books as $count => $book)

					@if($count%4==0)
						<div class="clearfix"></div>
						<hr />
					@endif

					<div class="col-sm-3">
						<p class="text-center">
							<a href="{{ route('books.show', ['slug' => $book->slug]) }}">
								@if(ClydeUpload::exists($book->book_cover))
									<img style="width:50%" src="{{ ClydeImage::url($book->book_cover, 'book_list' ) }}" title="{{ $book->title }}" />
								@else
									<img style="width:50%" src="http://www.placehold.it/260x330/EFEFEF/AAAAAA&amp;text=Sem+Foto" title="{{ $book->title }}" />
								@endif
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
			<h2>{{ trans('models.categories') }}</h2>
			<ul class="categorias_livros">
				@foreach($categories as $category)
					<li><a href="{{ url('books/category/'.$category->slug) }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection
