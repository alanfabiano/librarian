@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
@endsection


@section('content')

	<div class="row">

		<div class="col-sm-12">
			<h1>{{ trans('models.authors') }}</h1>


			<div class="row">
				<div class="col-sm-12">
					
					{!! Form::model($author, [ 'route' => ['admin.authors.update', $author->id ], 'method'=>'put', 'files' => true ] ) !!}

						@include('admin.authors._form')

						<div class="form-group text-center">
							{!! Form::submit('Editar Autor', ['class' => 'btn btn-primary'] ) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
