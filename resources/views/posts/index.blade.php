@extends('main')

@section('title', '| All Augments')

@section('content')
	<div class="row">

		<div class="col-md-10">
			<h1>All Augmented Businesses</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">New Augment</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>

		<div class="row">
			<div class="col-md-12">

				<table class="table table-hover">

  					<thead>
  						<th>#</th>
  						<th>Business</th>
  						<th>Description</th>
  						<th>Augmentified at</th>
  						<th></th>
  					</thead>

  					<tbody>
  						@foreach($posts as $post)

  							<tr>
  								<th>{{ $post->id }}</th>
  								<td>{{ $post->title}}</td>
  								<td>{{ substr($post->body, 0, 140)}}</td>
  								<td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
  								<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">View</a><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Edit</a></td>
  							</tr>

  						@endforeach
  						
  					</tbody>

				</table>
				   	
			</div>
		</div>
		

	</div>

@endsection