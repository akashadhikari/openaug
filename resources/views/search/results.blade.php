 @extends('main')

 @section('title', '| Search')

 @section('content')


	<div class="container">
		<h3>Search results for "{{ Request::input('query') }}"</h3>

        <div class="row">
            <div class="col-md-12">
				<div class="media">

						<a class="pull-left" href="#">
							<img class="media-object" alt="#" src="#">
						</a>
						
						<div class="media-body">
							<h4 class="media-heading"><a href="#">Swapidea</a></h4>
						</div>
				</div>
                
            </div>
        </div>
     </div>

 @endsection

	