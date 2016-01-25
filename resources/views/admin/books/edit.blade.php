@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery.restfulizer.js') }}"></script>
	<script type="text/javascript">
		$(function($){
			$(".destroy").restfulizer();

			$(".status").on('click',function(event){
				event.preventDefault();
				var selector = $(this);
				selector.html('<img src="/images/loading.gif">');
				$.ajax({
					dataType: "json",
					type:"POST",
					url: selector.attr('href'),
					data: {'_method' : 'PUT','type' : 'status'},
					success:function(p){
						if(p.active == true)
						{
							selector.html('<span class="glyphicon glyphicon-eye-open"></span>');
							selector.removeClass('btn-warning');
							selector.addClass('btn-success');
						}else{
							selector.html('<span class="glyphicon glyphicon-eye-close"></span>');
							selector.removeClass('btn-success');
							selector.addClass('btn-warning');
						}
					},
					error:function(){
					}
				});
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
					{!! Form::open(['method'=>'PUT']) !!}

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
