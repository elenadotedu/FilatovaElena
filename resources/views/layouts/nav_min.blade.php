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
                    <img src="{{ asset('assets/images/bugs/bug.png') }}"/>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <!--<li class="divider"></li>-->
                    <li><a href="">Total Bugs: 20</a></li>
                    <li><a href="">Dead: 0</a></li>
                    <li><a href="">About Bugs</a></li>
                </ul>
            </li>

        </ul>
    </div><!--/.nav-collapse -->
    <!-- /.navbar-static-side -->
</nav>