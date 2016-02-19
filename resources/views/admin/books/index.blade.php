@extends('admin')

@section('head')
	<link href="{{ asset('/css/custom-dark.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('/js/jquery.restfulizer.js') }}"></script>
	<script type="text/javascript">
		$(function($){
			$(".destroy").restfulizer({
				parse: true
			});

			$(".status").on('click',function(event){
				event.preventDefault();
				var selector = $(this);
				selector.html('<img src="/images/loading.gif">');
				$.ajax({
					dataType: "json",
					type:"GET",
					url: selector.attr('href'),
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

	<h1>{{ trans('models.books') }}</h1>

	<table class="table table-striped">

		<tr>
			<th>{{ trans('validation.attributes.status') }}</th>
			<th width="100">{{ trans('validation.attributes.book_cover') }}</th>
			<th>{{ trans('validation.attributes.id') }}</th>
			<th>{{ trans('validation.attributes.title') }}</th>
			<th>{{ trans('validation.attributes.slug') }}</th>
			<th>{{ trans('validation.attributes.option') }}</th>
		</tr>

		@foreach($books as $b)
			<tr>
				<td>
					@if($b->active == true)
						<a href="{{ route('admin.books.status',['id' => $b->id]) }}" class="btn btn-success status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-open"></span></a>
					@else
						<a href="{{ route('admin.books.status',['id' => $b->id]) }}" class="btn btn-warning status" data-id="{{ $b->id }}"><span class="glyphicon glyphicon-eye-close"></span></a>
					@endif
				</td>
				<td align="center">
					@if(ClydeUpload::exists($b->book_cover))
						<img class="thumb" src="{{ ClydeImage::url($b->book_cover, 'book_adm_list' ) }}" title="{{ $b->title }}" />
					@else
						<img class="thumb" src="http://www.placehold.it/60x70/EFEFEF/AAAAAA&amp;text=Sem+Foto" title="{{ $b->title }}" />
					@endif
				</td>
				<td>{{ $b->id }}</td>
				<td>{{ $b->title }}</td>
				<td>{{ $b->slug }}</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ trans('actions.action') }} <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="{{ route('admin.books.edit',['id' => $b->id]) }}">{{ trans('actions.edit') }}</a></li>
							<li><a class="destroy" data-method="DELETE" href="{{ route('admin.books.destroy', ['id' => $b->id, '_token' => csrf_token() ]) }}">{{ trans('actions.destroy') }}</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach

	</table>
	<div class="text-center">{!! $books->render() !!}</div>

@endsection
