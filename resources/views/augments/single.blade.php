@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

@section('content')

	<div class="row">

		<div class="col-md-4">
			<div class="well">

				<img class="img img-responsive" src="{{ asset('images/' . $post->image) }}" />

				<!-- <dl class="dl-horizontal">
					<label><br>URL</label>
					<p><a href="{{ route('augments.single', $post->slug) }}">{{ url('augments/'.$post->slug) }}</a></p>
				</dl> -->

				<dl class="dl-horizontal">
					<label>Augment Type:</label>
					<p><a>{{$post->category->name}}</a></p>
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
		 	<p> {!! $post->body !!} </p>

		 </div>
		 
		 

	</div>

	<div class="row">
		 <input type="hidden" name="" id="lat" value="{{ $post->lat}}">
		 <input type="hidden" name="" id="long" value="{{ $post->long}}">
		 <input type="hidden" name="" id="title" value="{{ $post->title}}">
		 <div id="map" style="min-height: 400px;"></div>
	</div>

	<hr>
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

 						{{ Form::submit('Submit Review', ['class' => 'pull-right btn btn-success', 'style' =>'margin-top: 15px;']) }}
 					</div>

 				</div>
 				

 				

            {{ Form::close() }}

		</div>
	</div>
@endsection

@section('scripts')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp1VJ_karyJHBxGvQ3B9H-Gb-W_aS5WKI&callback=initMap">
    </script>
    <script type="text/javascript" src="{{URL::asset('js/placeshower.js')}}"></script>
@endsection