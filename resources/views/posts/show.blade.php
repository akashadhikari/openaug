@extends('main')

@section('title', '| View Augments')

@section('content')

	<div class="row">

		<div class="col-md-4">
			<div class="well">

				<img src="{{ asset('images/' . $post->image) }}" height="190" width="320"/>

				<!-- <dl class="dl-horizontal">
					<label>URL</label>
					<p><a href="{{ route('augments.single', $post->slug) }}">{{ url('augments/'.$post->slug) }}</a></p>
				</dl> -->

				<dl class="dl-horizontal">
					<label>Augment Type:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Augmentified at:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Edited at:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
					</div> 

					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>

				<div class="row">
				    <div class="col-md-12">
				    	{{ Html::linkRoute('posts.index', '<< See all businesses', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) }}
				    </div>
				</div>

		    </div>
	    </div>
		
	     <div class="col-md-8">

	    	 <h1> {{ $post->title }} </h1>
			 <p class="lead">{!! $post->body !!}</p>

			<p>
				 <input type="hidden" name="" id="lat" value="{{ $post->lat}}">
				 <input type="hidden" name="" id="long" value="{{ $post->long}}">
				 <input type="hidden" name="" id="title" value="{{ $post->title}}">
				 <div id="map" style="min-height: 400px;border: 1px solid grey;"></div>
			</p>
	     </div> 

	    
	</div>

	

@endsection
@section('scripts')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp1VJ_karyJHBxGvQ3B9H-Gb-W_aS5WKI&callback=initMap">
    </script>
    <script type="text/javascript" src="{{URL::asset('js/placeshower.js')}}"></script>
@endsection