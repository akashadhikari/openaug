@extends('main')

@section('title', "| $post->title")

@section('content')

	<div class="row">

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>URL</label>
					<p><a href="{{ route('augments.single', $post->slug) }}">{{ url('augments/'.$post->slug) }}</a></p>
				</dl>

				<div class="row">
				    <div class="col-md-12">
				    	{{ Html::linkRoute('posts.index', '<< See all businesses', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) }}
				    </div>
				</div>

		    </div>
	    </div>

		 <div class="col-md-8">
		 	<h1> {{ $post->title }} </h1>
		 	<p> {{ $post->body }} </p>
		 </div>

	</div>

@endsection