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
        min-height:150px;
        background-color:#58a366; /*green*/
    }

    /*Side bar*/
    #wrapper, #side-menu {
        /*background-color: #b7babb;*/
        background-color: #66b575; /*lighter greens*/
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
        background-color:#6cbe7b; /*light green*/
    }

    /*Side navigation divider color*/
    .sidebar ul li
    {
        border-bottom-color:#FAFAFA;
    }

    /*Sign in / out*/
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus
    {
        background-color: #BAC5D1;
        color: #3D5C79;
    }

    /*Make if so that sign in /sign up are not all the way to the right*/
    .navbar-right {
        padding-right:20px;
    }

    /*fix scroll to the right*/
    .navbar-nav.navbar-right:last-child
    {
        margin-right:0px;
    }

    /*Sign out dropdown menu*/
    .navbar-nav>li>.dropdown-menu {
        margin-top:-10px;
        background-color:#FAFAFA;
    }

    .navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus
    {
        color: #0062B8;
    }
    .navbar-default .navbar-nav>li>a
    {
        color:#00417A;
    }
    .btn-info, .btn-info:hover, .btn-info:focus
    {
        background-color:#47A9FF;
        border-color:#47A9FF;
    }
    @media (min-width: 992px) {
        .navbar-nav>li>a {
            padding-top:25px;
            padding-bottom:25px;
        }
    }

    .input-group[class*=col-] {
        padding-left:15px;
        padding-right:15px;
    }

    .form-control[readonly],
    .form-control[disabled]
    {
        border:none;
        background-color:transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
        transition:none;
        -webkit-transition: none;
        cursor:initial;
        -webkit-appearance:none;
        -moz-appearance:none;
        appearance:none;
    }
    .form-view-field {
        padding-top:8px;
        padding-left:5px;
        display: block;
    }

    .nav-tabs {
        margin-bottom:15px;
    }
    .nav-tabs.nav-tabs-blue {
        border-bottom-color:#428bca;
    }
    .nav-tabs.nav-tabs-blue>li>a {
        margin-bottom: 1px;
    }
    .nav-tabs.nav-tabs-blue li.active a{
        background-color:#428bca;
        color:#FFF;
    }

    .nav-tabs a{
        background-color:#eee;
    }

    .file::-webkit-file-upload-button {
        color: white;
        background-color: #5bc0de;
        border-color: #46b8da;
        border: 1px solid transparent;
        padding: 8px;
        margin-top:-10px;
        margin-left:-12px;
    }

    h1,h2,h3,h4 {
        color: #3b6d44;
    }

    @show
</style>