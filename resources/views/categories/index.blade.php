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
			
					@foreach($categories as $category)
					
					<a href="{{route('pages.distinct',['cat' => $category->name])}}" class="list-group-item">{{$category->name}}</a>
						
				
					@endforeach
				
		</div>

		

	</div>

@endsection
