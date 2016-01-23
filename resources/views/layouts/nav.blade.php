<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><img src="{{asset('assets/images/logo.png')}}" /><!--<span class="glyphicon glyphicon-home"></span>@lang('general.site_name')--></a>
    </div>

    <!-- Top bar -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

        </ul>
    </div><!--/.nav-collapse -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <!-----------------------------------------------
            SIDE MENU
            ------------------------------------------------->

            <ul class="nav" id="side-menu">
                <!--
           Data Validation
            ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-check-square fa-fw"></i> Data Validation<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href="{{URL::to("validation_names")}}"><i class="icon-user"></i> Names</a></li>
                        <li pre-reg><a href="{{URL::to("validation_duplicate_addresses")}}"><i class="icon-user"></i> Duplicate Addresses</a></li>
                        <li pre-reg><a href="{{URL::to("validation_phone_numbers")}}"><i class="icon-user"></i> Phone Numbers</a></li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>

                <!--
               AI
               ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-cogs fa-fw"></i> AI<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href=""><i class="icon-user"></i> Jugs Solver</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!--
              How
              ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-info-circle fa-fw"></i> How I made this website?<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li pre-reg><a href=""><i class="icon-user"></i> Jugs Solver</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <!--
              AI
              ------------------------------------------------->
                <li>
                    <a href="#"><i class="fa fa-leaf fa-fw"></i> Why so green?</a>
                    <!-- /.nav-second-level -->
                </li>

            </ul>


        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <!-- /.navbar-static-side -->
</nav>