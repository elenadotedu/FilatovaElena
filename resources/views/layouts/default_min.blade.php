<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8" />
    <title>
        @section('title')
            @lang('general.site_name')
        @show
    </title>
    <meta name="author" content="Shared Science" />
    <meta name="description" content="A CRM system for Shared Science." />

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS
    ================================================== -->
    @include('layouts.head')

</head>

<body>
<div id="wrapper">
    @include('layouts.nav_min')
    <div id="page-wrapper" style="margin:0">
        <div class="row">
            <div class="col-lg-12">

                <!-- Notifications -->
                @include('errors.notifications')

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @section('content')
        @show
    </div> <!-- /.page-wrapper -->
    @include('layouts.footer')
</div> <!-- /#wrapper -->

<!-- Javascripts
================================================== -->
@include('layouts.bottom')
@section('body_bottom')
@show
</body>
</html>