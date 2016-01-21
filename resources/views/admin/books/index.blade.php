@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery.restfulizer.js') }}"></script>
	<script type="text/javascript">
		$(function($){
			$(".destroy, .edit").restfulizer();
			$(".status").on('click',function(){
				alert($(this).data('id'));
			});
		});
	</script>

@endsection


@section('content')
	
	<h1>Livros</h1>

	<table class="table table-striped">
		
		<tr>
			<th>Status</th>
			<th>ID</th>
			<th>Title</th>
			<th>Slug</th>
			<th>Options</th>
		</tr>

		@foreach($books as $b)
			<tr>
				<td>
					@if($b->active == true)
						<button type="button" class="btn btn-success status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-open"></span></button>
					@else
						<button type="button" class="btn btn-warning status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-close"></span></button>
					@endif
				</td>
				<td>{{ $b->id }}</td>
				<td>{{ $b->title }}</td>
				<td>{{ $b->slug }}</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="edit" data-method="PUT" href="{{ route('admin.books.update',['id' => $b->id]) }}">Edit</a></li>
							<li><a class="destroy" data-method="DELETE" href="{{ route('admin.books.destroy', ['id' => $b->id ]) }}">Destroy</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach

	</table>
	<div class="text-center">{!! $books->render() !!}</div>


@endsection