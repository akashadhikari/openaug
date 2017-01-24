@extends('main')
@section('title', '| Welcome')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="list-group">
                <a class="list-group-item list-group-item-info">
                Trend listing according to comments and ratings.
                </a>
                </div>
                @foreach($posts as $post)

                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->body }}</p>
                        Tags: <span class="label label-warning">Software</span><br><br>
                        <a href="#" class="btn btn-success">Learn more</a>  
                    </div>
                    <hr>  

                @endforeach 


            </div>

            <div class="col-md-3">
                         
                    
                         <div class="list-group">
                          <a href="/" class="list-group-item list-group-item-info">
                            Popular listing
                          </a>
                          <a href="#" class="list-group-item">Agriculture </a>
                          <a href="#" class="list-group-item">Art and Craft</a>
                          <a href="#" class="list-group-item">Banking</a>
                          <a href="#" class="list-group-item">Electronics</a>
                          <a href="#" class="list-group-item">Software</a>
                        </div>
            </div>
        
         </div>

    </div>
    


@endsection