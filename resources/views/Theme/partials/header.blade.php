<header class="main-header">
    <nav class="navbar navbar-static-top">


        <div class="container">
            <img src="/Theme/dist/img/nahdi.png" class="pull-left">

            <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>Nahdi</b>gate</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            {{-- check for auth users to appear up nav  --}}
            @if(auth()->check())
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li @yield('orders_active')><a href="/orders">Dashborad<span class="sr-only">(current)</span></a></li>
                    {{--<li><a href="#">Control Panel</a></li>--}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Control Panel
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Materials & Assets</a></li>
                            <li><a href="#">Locations</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Users & Workers</a></li>
                            <li><a href="#">Assignments</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Costs</a></li>
                        </ul>
                    </li>
                </ul>


                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group col-xs-10">
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                    </div>
                </form>
            </div>

            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset('/theme/dist/img/avatar5.png')}}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset('/theme/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

                                <p>{{auth()->user()->name }}
                                <small>Location: {{auth()->user()->location}}</small></p>

                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="/auth/logout" class="btn btn-danger btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
            @endif
        </div>
        <!-- /.container-fluid -->
    </nav>

    @yield('header')
</header>
