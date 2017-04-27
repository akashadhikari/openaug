@extends('main')

@section('title', '| Categories')

@section('content')

	<div class="col-md-3">
			<div class="well">
				
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
				<h2>Add</h2>
 			
 				{{ Form::label('name','Augment Category') }}
 				{{ Form::text('name', null, ['class' => 'form-control']) }}

 				{{ Form::submit('Create New Category', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

            {!! Form::close() !!}

			</div>
		</div>
	
	<div class="row">
		<div class="col-md-8">
			<h1>Augment Categories</h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<th>{{ $category->name }}</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		

	</div>

@endsection
