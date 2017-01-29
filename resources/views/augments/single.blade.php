@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

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
		 	<hr>
		 </div>

	</div>

<!-- SHOWINFG THE COMMENTS NOT WORKING
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				{{ $comment->comment }};
			@endforeach
		</div>
	</div> -->

	<div class="row">
		<div class="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
			<h3>Been Here? Add A Review</h3>
 			
 				<div class="row">

 					<div class="col-md-6">
 						{{ Form::label('name','Your Name') }}
 						{{ Form::text('name', null, ['class' => 'form-control']) }}
 					</div>

 					<div class="col-md-6">
 						{{ Form::label('email','Your Email') }}
 						{{ Form::text('email', null, ['class' => 'form-control']) }}
 					</div>

 					<div class="col-md-12">
 						{{ Form::label('comment','Review The Business') }}
 						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows'=> '5']) }}

 						{{ Form::submit('Submit Review', ['class' => 'btn btn-success btn-block', 'style' =>'margin-top: 15px;']) }}
 					</div>

 				</div>
 				

 				

            {{ Form::close() }}

		</div>
	</div>



@endsection