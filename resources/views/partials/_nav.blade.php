 <!--Navbar-->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('house') }}">
                <strong>openAug</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item{{ Request::is('about') ? "active" : "" }}">
                        <a class="nav-link waves-effect waves-light" href="{{route('house')}}/about"><i class="fa fa-info"></i> About</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                        <a class="nav-link waves-effect waves-light" href="{{route('house')}}/contact"><i class="fa fa-envelope"></i> Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @if(!Auth::check())
                        <li class="nav-item{{ Request::is('login') ? "active" : "" }}">
                            <a class="nav-link waves-effect waves-light" href="{{route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i></i> Login</a>
                        </li>
                        <li class="nav-item{{ Request::is('register') ? "active" : "" }}">
                            <a class="nav-link waves-effect waves-light" href="{{route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Register</a>
                        </li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" type="button" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fa fa-smile-o" aria-hidden="true"></i> Hi {{Auth::user()->name}}</a>
                        <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item waves-effect waves-light" href="{{ route('user.profile', ['userid' => Auth::user()->id] )}}">
                                <i class="fa fa-user" aria-hidden="true"></i> Your profile
                            </a>
                            <a class="dropdown-item waves-effect waves-light" href="#">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Log out
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>


            </div>
        </div>
    </nav>
    <!--/.Navbar-->

@if(Request::is('/'))
    <!--header-->
    <div class="view hm-black-strong">
        <div class="full-bg-img flex-center">
           <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Search Places...</h2><hr>
                <form action="{{route('search.result')}}" method="get">
                   <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="search-query form-control" placeholder="Search" id="auto" name="query"/>
                            <span class="input-group-btn">
                                <button class="btn btn-danger btn-block" type="submit"/>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/header-->
    <hr>
@endif
