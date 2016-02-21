@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">

	<script type="text/javascript">
		$(function(){
			$(".has-error").on('click',function(){
				$(this).removeClass('has-error');
			});
		});
	</script>

@endsection


@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h1>{{ trans('models.books') }}</h1>

			<div class="row">
				<div class="col-sm-12">
					{!! Form::open([ 'route' => 'admin.authors.store', 'method'=>'post', 'id' => 'save', 'files' => true ]) !!}

						@include('admin.authors._form')

						<div class="form-group text-center">
							{!! Form::submit('Salvar Autor', ['class' => 'btn btn-primary'] ) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
