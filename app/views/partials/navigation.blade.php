<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}">H Manager</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('users') }}">Users</a></li>
                        <li><a href="{{ URL::to('users/create') }}">Create a User</a></li>
                    </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('members') }}">Members</a></li>
                        <li><a href="{{ URL::to('members/create') }}">Create a Member</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('membertypes') }}">Member Types</a></li>
                        <li><a href="{{ URL::to('membertypes/create') }}">Create a Member Type</a></li>
                    </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hostels<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('hostels') }}">Hostels</a></li>
                        <li><a href="{{ URL::to('hostels/create') }}">Create a Hostel</a></li>
                    </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('events') }}">Events</a></li>
                        <li><a href="{{ URL::to('events/create') }}">Create an Event</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('eventtypes') }}">Event Types</a></li>
                        <li><a href="{{ URL::to('eventtypes/create') }}">Create an Event Type</a></li>
                    </ul>
                </li>-->
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                @else 
                <li><a href="{{ URL::to('/') }}">Book a hostel</a></li>
                <li><a href="{{ URL::to('members/create') }}">Become a Member</a></li>
                <li><a href="{{ URL::to('login') }}">Login</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::to('cart') }}"><i class="fa fa-shopping-cart"></i>{{ $basket }} items in your basket | View Cart</a></li>
            </ul>
        </div>
    </div>
</nav>