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

			@if (Session::has('message'))
			    <div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif

			<div class="row">
				<div class="col-sm-12">
					{!! Form::open([ 'route' => 'admin.books.store', 'method'=>'post', 'files' => true ]) !!}

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
