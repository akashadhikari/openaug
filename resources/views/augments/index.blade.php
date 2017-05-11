	<div class="row">
		<div class="col-md-8">
			<h3 style="color: ">Augments created</h3>
	    </div>
	</div>
	<hr>
	@foreach($posts as $post)

	<div class="media">
	  <div class="media-left">
	    <a href="#">
	    @if($post->image==NULL)
	    <img class="media-object dp img" src="{{$user->getAvatarUrl()}}" height="190" width="320"/>
	   	@else
	   	<img src="{{ asset('images/' . $post->image) }}" height="190" width="320"/>
	   	@endif
	      
	    </a>
	  </div>
	  <div class="media-body">
	  	<div class="col-md-6">
	   		<h3>{{ $post->title }}</h3>
	   		<p>{!! $post->body !!}</p>
			Augment type: <span class="label label-warning">{{$post->category->name}}</span><br>
			<h5><b>Created at:</b> {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
			
			<a href="{{ route('augments.single', $post->slug) }}" class="btn btn-primary">Learn more</a>
		</div>
	  </div>
	</div>
	<hr>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
	    </div>
	</div>
