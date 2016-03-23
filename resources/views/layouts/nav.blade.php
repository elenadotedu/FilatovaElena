<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{URL::to("/")}}"><img src="{{asset('assets/images/logo.png')}}" /><!--<span class="glyphicon glyphicon-home"></span>@lang('general.site_name')--></a>
    </div>

    <!-- Top bar -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    <div class="bugs_counts_outer_wrapper">
                        <div class="bugs_counts_outer">
                            <span class="bugs_dead_count">{{Bugs::deadCount()}}</span> /
                            <span class="bugs_total_count">{{Bugs::totalCount()}}</span>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/bugs/bug.png') }}"/>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <!--<li class="divider"></li>-->
                    <li><a href="">Total Bugs: <span class="bugs_total_count">{{Bugs::totalCount()}}</span></a></li>
                    <li><a href="">Dead: <span class="bugs_dead_count">{{Bugs::deadCount()}}</span></a></li>
                    <li><a href="{{route('bugs.about')}}">About Bugs</a></li>
                </ul>
            </li>

        </ul>
    </div><!--/.nav-collapse -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <!-----------------------------------------------
            SIDE MENU
            ------------------------------------------------->

            <ul class="nav" id="side-menu">

            <!-- JavaScript Tools
            ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> JavaScript Tools<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href="{{URL::to("js_validators_name")}}">Validators<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li pre-reg><a href="{{URL::to("js_validators_name")}}">Name</a></li>
                            <li pre-reg><a href="{{URL::to("js_validators_address")}}">Address</a></li>
                            <li pre-reg><a href="{{URL::to("js_validators_other")}}">Other</a></li>
                        </ul>
                        </li>

                    </ul>

                    <!-- /.nav-second-level -->
                </li>

                <!-- Database Applications
                ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-database fa-fw"></i> Database Applications<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href="{{URL::to("db_applications/shared_science")}}">Shared Science</a>
                        <li pre-reg><a href="{{URL::to("db_applications/zlyne")}}">Zlyne</a>
                        </li>

                    </ul>

                    <!-- /.nav-second-level -->
                </li>

                <!--
                AI
                ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-cogs fa-fw"></i> AI<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href="{{route('jug_solver.index')}}"><i class="icon-user"></i> Jug Solver</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <!-- For Fun
                ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-child fa-fw"></i> For Fun<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href="https://www.touchdevelop.com/aexqc" target="_blank"> Dirty Bits Game</a></li>
                        <li pre-reg><a href="http://todturtle.byethost14.com/index.html?ckattempt=1">Turtle Tutorials</a>
                            <!--<ul class="nav nav-third-level">
                                <li pre-reg><a href="http://todturtle.byethost14.com/index.html?ckattempt=1" target="_blank">TouchDevelop</a></li>
                                <li pre-reg><a href="">JavaScript</a></li>
                            </ul>-->
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>
                <!--
              How
              ------------------------------------------------->
                <!--<li>
                    <a href="#"><i class="fa fa-info-circle fa-fw"></i> How I made this website?<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href=""><i class="icon-user"></i> Jugs Solver</a></li>
                    </ul>
                </li>-->

                <!--
              About
              ------------------------------------------------->
                <li>
                    <a href="{{URL::to('contact')}}"><i class="fa fa-phone fa-fw"></i> Contact</a>
                    <!-- /.nav-second-level -->
                </li>

            </ul>


        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <!-- /.navbar-static-side -->
</nav>