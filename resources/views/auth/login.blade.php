@extends('main')

@section('title', '| Login')

@section('content')

	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
		<h3>Please login to continue</h3><hr>
			{!! Form::open() !!}
				{{ Form::label('email', "Email:") }}
				{{ Form::email('email', null, ['class' => 'form-control' ]) }}

				{{ Form::label('password', "Password:") }}
				{{ Form::password('password', ['class' => 'form-control' ]) }}

				<br>

				{{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}
				<br>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block' ]) }}


			{!! Form::close() !!}

	    </div>
	</div>

@endsection