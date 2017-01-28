@extends('main')

@section('title', "| Augments")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Augments</h1>
	    </div>
	</div>

	@foreach($posts as $post)

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $post->title }}</h2>
			<p><b>Business Type:</b> {{ $post->category->name }}</p>
			<h5><b>Regmented at:</b> {{ date('M j, Y', strtotime($post->updated_at)) }}</h5>
			<p>{{ $post->body }}</p>
			<a href="{{ route('augments.single', $post->id) }}" class="btn btn-primary">Learn more</a>
			<hr>
	    </div>
	</div>

	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
	    </div>
	</div>


@endsection