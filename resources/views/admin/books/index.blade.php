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

	<h1>{{ trans_choice('webcontrol.book',2) }}</h1>

	<div id="retorno"></div>

	<table class="table table-striped">

		<tr>
			<th>{{ trans('webcontrol.status') }}</th>
			<th>{{ trans('webcontrol.id') }}</th>
			<th>{{ trans_choice('webcontrol.title',1) }}</th>
			<th>{{ trans('webcontrol.slug') }}</th>
			<th>{{ trans_choice('webcontrol.option',1) }}</th>
		</tr>

		@foreach($books as $b)
			<tr>
				<td>
					@if($b->active == true)
						<a href="{{ route('admin.books.update',['id' => $b->id]) }}" class="btn btn-success status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-open"></span></a>
					@else
						<a href="{{ route('admin.books.update',['id' => $b->id]) }}" class="btn btn-warning status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-close"></span></a>
					@endif
				</td>
				<td>{{ $b->id }}</td>
				<td>{{ $b->title }}</td>
				<td>{{ $b->slug }}</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ trans_choice('webcontrol.action',1) }} <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="{{ route('admin.books.edit',['id' => $b->id]) }}">{{ trans('webcontrol.edit') }}</a></li>
							<li><a class="destroy" data-method="DELETE" href="{{ route('admin.books.destroy', ['id' => $b->id ]) }}">{{ trans('webcontrol.destroy') }}</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach

	</table>
	<div class="text-center">{!! $books->render() !!}</div>

@endsection
