@extends('main')
@section('title', '| Welcome')

@section('content')

<div class="row">
    <div class="col-md-8">
      @if($posts->count() == 0)
          <div class="list-group" style="margin-bottom:20px; ">
            <li href="#" class="list-group-item list-group-item-info">
             Sorry, result not found.
            </li>
          </div>
      @elseif($posts->count() > 0)
          <div class="list-group" style="margin-bottom:20px; ">
              <li href="#" class="list-group-item list-group-item-info">
              Your results
              </li>
            </div>
           @foreach($posts as $post)
          <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img src="{{ asset('images/' . $post->image) }}" height="190" width="320"/>
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="col-md-12">
                        <h3>{{ $post->title }}</h3>
                        <p>{!! $post->body !!}</p>
                      Augment type: <span class="label label-warning">{{$post->category->name}}</span><br><br>
                      
                      
                      <a href="{{ route('augments.single', $post->slug) }}" class="btn btn-success">Learn more</a>
                    </div>
                </div>
          </div>

              <hr>  
            @endforeach 

      @endif
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