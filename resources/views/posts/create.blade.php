 @extends('main')

 @section('title', '| New Post')

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

 		<div class="col-md-10 col-md-offset-1">
 			<h2>Setup new augment</h2>
 			<hr>

 			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
 			
 				<div class="form-group col-md-12">
 					<label>Company Name or Business Place</label>
 					<input type="text" name="title" class="form-control">
 				</div>

 				<div class="form-group col-md-12">
 					<label>URL Slug</label>
 					<input type="text" name="slug" class="form-control">
 				</div>

 				<div class="col-lg-6 form-group">
	 				{{ Form::label('category_id', 'Business Type:') }}
	 				<select class="form-control" name="category_id">
	 					@foreach($categories as $category)
	 						<option value='{{ $category->id }}'>{{ $category->name }}</option>
	 					@endforeach
	 				</select>
 				</div>

 				
				<div class="col-lg-6 form-group">
 					<label>Featured image</label>
 					<input type="file" name="featured_image" class="form-control">
 				</div><br/><br/>

 				<div class="col-md-12">
 					<label>Pick a location on map</label>	
 					<div id="map"></div><br>
 				</div>
 				<div class="form-group col-md-6">
 				<label>Latittude</label>
 					<input type="text" id="lat" readonly="yes" class="form-control" name="lat"><br>
 				</div>

 				<div class="form-group col-md-6">
 				<label>Longitude</label>		 
                   <input type="text" id="lng" readonly="yes" class="form-control" name="lng">
 				</div>
 				<div class="form-group col-md-12">
 					<label>Description</label>
 					<textarea name="body" class="form-control" rows="10"></textarea>
 				</div>
 				<div class="col-md-12"> 
 					{{ Form::submit('Publish', array('class' => 'btn btn-primary pull-right', 'style' => 'margin-top:20px;')) }}
 				</div>
            {!! Form::close() !!}
 			
 		</div>

 	</div>

 @endsection
 
 @section('scripts')
      	 <script type="text/javascript" src="{{URL::asset('js')}}/mappicker.js"></script>

 @stop