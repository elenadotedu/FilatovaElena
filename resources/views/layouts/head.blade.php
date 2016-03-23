<link href="{{ URL:: asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

<!-- Timeline CSS -->
<link href="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css') }}" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!-- Datepicker -->
<link href="{{ URL:: asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">

<!-- Query Builder -->
<link href="{{URL:: asset('assets/css/query-builder.default.min.css')}}" rel="stylesheet" type="text/css">

<!-- Data Tables -->
<link href="{{URL:: asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">

<style>
    @section('styles')

        body #page-wrapper {
        background-color: #FDFDFD;
    }
    /*Top and bottom colors*/
    #footer {

        line-height: 40px;
        background-color: #58a366; /*green*/
        color:#FFF;
        padding-top: 10px;

    }

    .navbar, .navbar-brand {
        min-height:90px;
        background-color:#58a366; /*green*/
    }

    /*Make if so that right side bar is not all the way to the right*/
    .navbar-right {
        padding-right:20px;
    }

    /*fix scroll to the right*/
    .navbar-nav.navbar-right:last-child
    {
        margin-right:0px;
    }

    /*Side bar*/
    #wrapper, #side-menu {
        /*background-color: #b7babb;*/
        background-color: #66b575; /*lighter greens*/
    }

    /*right side nav bar colors*/
    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.open>a,
    .navbar-default .navbar-nav>.open>a:hover,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus,
    .navbar-default .navbar-nav>.open>a:focus
    {
        background-color: transparent;
        color:#FFF;
        font-size:18px;
    }

    /*right side dropdown*/
    .navbar-right .dropdown-menu {
        background-color:#66b575;
    }
    .navbar-right .dropdown-menu>li>a {
        color:#FFF;
        font-size:18px;
    }
    .navbar-right .dropdown-menu>li>a:hover {
        background-color: #58a366;
    }
    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a {
            color:#FFF;
        }
        .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,
        .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
            color:#F5F5F5;
        }
    }

    /*Color of the side navigation links text*/
    #side-menu li a {
        color: #f6fff6;
    }

    /*Color of the side navigation tabs when hovered*/
    #side-menu li a:hover,
    #side-menu li a:focus,
    #side-menu li a:active,
    #side-menu li a:visited
    {
        background-color:#58a366; /*light green 6cbe7b*/
    }

    /*Sidebar width*/
    @media(min-width:768px) {
        .sidebar {
            width: 300px;
        }
        #page-wrapper {
            margin: 0 0 0 300px;
        }
    }

    /*Sidebar font*/
    .sidebar {
        font-size:18px;
    }

    /*Height of navigation links*/
    .nav>li>a {
       padding: 15px 15px;
    }

    @media(max-width:768px) {

        /*Color of the menu button on small screens*/
        .navbar-default .navbar-toggle {
            background-color:#FFF;
        }

        /*The space between logo and nav*/
        .navbar-collapse {
            border-top:none;
            border-bottom:1px solid;
            box-shadow: none;
        }

    }

    /*Side navigation divider color*/
    .sidebar ul li
    {
        border-bottom-color:#FAFAFA;
    }

    h1,h2,h3,h4 {
        color: #3b6d44;
    }
    h1 {
        font-size:42px;
    }

    /*button colors*/
    .btn-info
    {
        background-color:#66b575;
        border-color:#66b575;
    }
    .btn-info:hover, .btn-info:focus {
        background-color:#58a366;
        border-color:#58a366;
    }
    
    /*bugs counts*/
    .bugs_counts_outer_wrapper {
        float:left;
        margin-right:5px;
    }
    .bugs_counts_outer {
        white-space:nowrap;
        padding: 7px;
        border: 2px solid #FFF;
        background-color:#c28b3c;
        border-radius: 20px;
        min-width: 74px;
        text-align:right;
    }
    .bugs_counts_outer_animation {
        -webkit-animation-name: bugkill; /* Chrome, Safari, Opera */
        -webkit-animation-duration: 1s; /* Chrome, Safari, Opera */
        animation-name: bugkill;
        animation-duration: 1s;
    }

    /* Chrome, Safari, Opera */
    @-webkit-keyframes bugkill {
        from {background-color: #c28b3c;}
        to {background-color: #66b575;}
    }

    /* Standard syntax */
    @keyframes bugkill {
        from {background-color: #c28b3c;}
        to {background-color: #66b575;}
    }
    /*bugs*/
    .bug_wrapper {
        min-width: 35px;
        height: 35px;
    }
    .bug {
        cursor: url("{{asset('assets/images/bugs/spray_can.png')}}"), pointer;
    }

    #footer {
        text-align:center;
    }

    @show
</style>