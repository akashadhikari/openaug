@extends('main')
@section('title', '| Welcome')

@section('content')
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
                        <p>{!! $post->body !!}</p>
                        Category: <span class="label label-warning">{{$post->category->name}}</span><br><br>
                        <a href=" {{ route('augments.single', $post->slug) }} " class="btn btn-success">Learn more</a>  
                    </div>
                    <hr>  

                @endforeach 


            </div>

            <div class="col-md-3">
                         
                    
                         <div class="list-group">
                          <a href="/" class="list-group-item list-group-item-info">
                            Popular Categories
                          </a>
                          @if($categories->count() < 0)
                            <p>Nothing to show</p>
                          @else
                            @foreach($categories as $category)
                             <a href="{{route('pages.distinct',['cat' => $category->name])}}" class="list-group-item">{{$category->name}}</a>
                            @endforeach
                          @endif
                        </div>
            </div>
        
         </div>
@endsection