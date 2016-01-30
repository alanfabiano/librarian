@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
	<style>
		.error{

		}
	</style>
@endsection


@section('content')
	
	<div class="row">

		<div id="retorno"></div>

		<div class="col-sm-12">
			<h1>{{ trans('messages.livros.titulo') }}</h1>
			
			<div class="row">
				<div class="col-sm-12">
					{!! Form::open([ 'route' => 'admin.books.store', 'method'=>'post', 'id' => 'save' ]) !!}

						@include('admin.books._form')

						<div class="form-group text-center">
							{!! Form::submit('Salvar Livro', ['class' => 'btn btn-primary'] ) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection