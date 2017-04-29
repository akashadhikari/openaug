<div class="row well">
    <div class="col-md-5">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src="{{$user->getAvatarUrl()}}">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="{{ route('user.profile', ['userid' => Auth::user()->id] )}}">{{$user->name}}</a> </h4>
                <small> Address</small>
            </div>
        </div>
    </div>

     <div class="col-md-5 pull-right">
       <a href="{{ route('posts.create') }}" class="btn btn-primary">Create new augment</a>
       <a href="{{ route('posts.index') }}" class="btn btn-warning">List view</a>
    </div>
</div>
