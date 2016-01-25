<div class="form-group">
	{!! Form::label('Title', 'Title:') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('author', 'Author:') !!}
	{!! Form::select('author', $authors, null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::label('book_cover', 'Book Cover:') !!}
	{!! Form::input('file', 'book_cover', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('resume', 'Resume') !!}
	{!! Form::textarea('resume', null, ['class' => 'form-control'] ) !!}
</div>