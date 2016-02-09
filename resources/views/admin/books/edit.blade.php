@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
@endsection


@section('content')

	<div class="row">

		<div class="col-sm-12">
			<h1>{{ trans('models.books') }}</h1>


			<div class="row">
				<div class="col-sm-12">
					
					{!! Form::model($book, [ 'route' => ['admin.books.update', $book->id ], 'method'=>'put', 'files' => true ] ) !!}

						@include('admin.books._form')

						<div class="form-group text-center">
							{!! Form::submit('Editar Livro', ['class' => 'btn btn-primary'] ) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
