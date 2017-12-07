@extends('main')

@section('title', '| Edit Augments')

@section('stylesheets')

	 <style type="text/css">
          #map{ height:420px;border: 2px solid grey;}
     </style>

	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	 <script>
	 	tinymce.init({
	 		selector: 'textarea',
	 		plugins: 'link',
	 		menubar: false
	 	});
	 </script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWmmA_OBuWijfD7TpF60u7JRa-C91D6oQ&callback=initMap"></script>
 @endsection

@section('content')

	<div class="row">


		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

			<div class="col-md-4">
		
				<div class="well">

					<dl class="dl-horizontal">
						<dt>Augmented at:</dt>
						<dd>{{ date('M j, Y', strtotime($post->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Edited at:</dt>
						<dd>{{ date('M j, Y', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-md-12">
							{{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) }}
						</div>

						<div class="col-sm-12">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>

			    </div>
		    </div>

	     <div class="col-md-8">
	     	{{ Form::label('title', 'Augment:') }}
	     	{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

	     	{{ Form::label('slug', 'URL Slug:', ['class' => 'form-spacing-top']) }}
	     	{{ Form::text('slug', null, ["class" => 'form-control']) }}

	     	{{ Form::label('category_id', 'Augment Type:', ['class' => 'form-spacing-top']) }}
	     	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

	     	{{ Form::label('featured_image','Update Augment Image', ['class' => 'form-spacing-top']) }} 
			{{ Form::file('featured_image') }}

	     	{{ Form::label('body', 'Description:', ['class' => 'form-spacing-top']) }}
	     	{{ Form::textarea('body', null, ["class" => 'form-control']) }}
	    	 
	     	<br>
 			<label>Pick a location on map</label>	
 			<div id="map"></div><br>

 			{{ Form::label('lat', 'Latitude:', ['class' => 'form-spacing-top']) }}
	     	{{ Form::text('lat', null, ["class" => 'form-control']) }}

	     	{{ Form::label('lng', 'Longitude:', ['class' => 'form-spacing-top']) }}
	     	{{ Form::text('lng', null, ["class" => 'form-control']) }}

 			
 			

	     </div> 

	    
	    {!! Form::close() !!}
	</div>

@endsection
 @section('scripts')
      	 <script type="text/javascript" src="{{URL::asset('js')}}/mappicker.js"></script>

 @stop