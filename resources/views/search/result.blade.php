@extends('main')
@section('title', '| Search results')

@section('content')
        <div class="row">
          
          <div class="col-md-8">
        @if($posts->count() == 0)
                <div class="list-group">
                  <a class="list-group-item list-group-item-info">
                  No records found...
                  </a>
                </div>
        @else
                <div class="list-group">
                  <a class="list-group-item list-group-item-info">
                  Your search results...
                  </a>
                </div>

                @foreach($posts as $post)
                  <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img src="{{ asset('images/' . $post->image) }}" height="180" width="300">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="col-md-12">
                            <h3>{{ $post->title }}</h3>
                            <p>{!! $post->body !!}</p>
                          Augment type: <span class="label label-warning">{{$post->category->name}}</span><br><br>
                          
                          
                          <a href="{{ route('augments.single', $post->slug) }}" class="btn btn-sm btn-success">Learn more</a>
                        </div>
                  </div>
                  <hr>  

                @endforeach 
            </div>
        @endif

        
            
        
         </div>
@endsection