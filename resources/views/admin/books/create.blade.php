@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
<<<<<<< HEAD
	<style>
		.error{

		}
	</style>
=======

>>>>>>> 0b507571fef1ad79c8c762aa58daca6453a7cfab
@endsection


@section('content')

	<div class="row">

		<div id="retorno"></div>

		<div class="col-sm-12">
<<<<<<< HEAD
			<h1>{{ trans('messages.livros.titulo') }}</h1>
			
=======
			<h1>{{ trans('models.books') }}</h1>



>>>>>>> 0b507571fef1ad79c8c762aa58daca6453a7cfab
			<div class="row">
				<div class="col-sm-12">
					{!! Form::open([ 'route' => 'admin.books.store', 'method'=>'post', 'id' => 'save' ]) !!}

						@include('admin.books._form')

						<div class="form-group text-center">
							{!! Form::submit('Salvar Livro', ['class' => 'btn btn-primary'] ) !!}
						</div>

<<<<<<< HEAD
=======

>>>>>>> 0b507571fef1ad79c8c762aa58daca6453a7cfab
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
