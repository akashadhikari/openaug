 @extends('main')

 @section('title', '| New Post')

 @section('stylesheets')

 		{!! Html::style('css/parsley.css') !!}

 @endsection

 @section('content')

 	<div class="row">

 		<div class="col-md-8 col-md-offset-2">
 			<h1>Setup Your Business Information</h1>
 			<hr>

 			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
 			
 				{{ Form::label('title','Business Name: (100 characters max)') }}
 				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}

 				{{ Form::label('slug','URL Slug') }}
 				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '140')) }}

 				{{ Form::label('body','Business Description: (140 characters max)') }}
 				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '140')) }}

 				{{ Form::submit('Create Your Augmented Business', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

            {!! Form::close() !!}
 			
 		</div>

 	</div>

 @endsection

 @section('scripts')

 	{!! Html::script('js/parsley.min.js') !!}

 @endsection