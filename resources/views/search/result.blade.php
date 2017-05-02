@extends('main')
@section('title', '| Search results')

@section('content')
        <div class="row">
        <div class="col-md-4">
                         <div class="list-group">
                          <a href="/" class="list-group-item list-group-item-info">
                            Popular listing
                          </a>
                          @if($categories->count() == 0)
                            <p>Nothing to show</p>
                          @else
                            @foreach($categories as $category)
                            <a href="#" class="list-group-item">{{$category->name}}</a>
                            @endforeach
                          @endif
                        </div>
            </div>
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
                  <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p>{!! $post->body !!}</p>
                        Category: <span class="label label-warning">{{$post->category->name}}</span><br><br>
                        <a href=" {{ route('augments.single', $post->slug) }} " class="btn btn-success">Learn more</a>  
                   </div>
                   <hr>  

                @endforeach 
            </div>
        @endif
            
        
         </div>
@endsection