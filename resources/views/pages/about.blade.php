@extends('main')
@section('title', '| Welcome')

@section('content')
    <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    About {{ $data['fullname'] }}
                </div>
                <p><b> We are an independent AI research company specifically based on Augmented Reality, Machine Learning andArtificial Intelligence.<br> Contact {{ $data['email'] }}</b></p>

            </div>
    </div>
@endsection