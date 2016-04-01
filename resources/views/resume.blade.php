@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Resume
    @parent
@stop
<style>

</style>

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Elena Filatova</h1>
    </div>
    <p><img src="{{URL:: asset('assets/images/icons/pdf_icon.png')}}" /> <a href="{{URL:: asset('assets/files/resume.pdf')}}">Download a PDF Resume</a></p>
    <h2>Education</h2>
    <div class="row">
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
                <p><strong>California State University, Long Beach - B.S. Computer Science</strong> Summa Cum Laude. Fall 2015. </p>
                <p><strong>El Camino College - Associate of Science</strong> with honors.</p>
            <p><strong>Cumulative GPA:</strong> 3.97, <strong>CSULB GPA:</strong> 4.0</p>
            <p><strong>Awards:</strong> Excellence in Physics, Academic Achievement in the Field of Mathematics, Foundation Scholars Award, President's Honor List.</p>
        </div>
    </div>

    <h2>Skills</h2>
    <div class="row">
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
                <p><strong>Programming Languages: </strong>Java, C, C++, C#, Python, JavaScript, JQuery, Ajax, Json, HTML, CSS, XML, PHP, SQL. </p>
                <p><strong>Software and Frameworks: </strong> Adobe Creative Suite, Apache, Linux, MySQL, Netsuite, Magento, Laravel, Unity 3D, Eclipse, Visual Studio.</p>
                <p><strong>Other: </strong>Web Development, Version Control (SVN, Git), Software Engineering.</p>
                <p><strong>Laguages: </strong>English, Russian.</p>
        </div>
    </div>

    <h2>Experience</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>Zlyne (June 2015 - current, Long Beach, CA)</h3>
            <p>Zlyne started as a research project, whose purpose is to reduce terminal traffic congestion at the Port of Long Beach. It was sponsored by the CSULB Research Foundation.
                Faculty members participating in the project: Dr. Burkhard Englert, a Chair of Computer Science Department at CSULB; Dr. Mehrdad Aliasgari, Assistant Professor at CSULB;
                Dr. Shadnaz Asgari, Assistant Professor at CSULB.
            </p>
            <p><strong>Position: </strong> Full Stack Web Developer</p>
            <p>Duties:</p>
            <ul>
                <li>Installed and configured <strong>LAMP</strong> on <strong>Amazon AWS Ubuntu</strong> server. Worked with <strong>Apache</strong> configuration file.</li>
                <li>Collaborated with other team members on creating the requirements and the documentation.</li>
                <li>Set up <strong>MySQL</strong> database tables and seeded the initial data.</li>
                <li>Used <strong>Laravel MVC</strong> framework to create models, views, controllers and other project files in <strong>PHP</strong>.</li>
                <li>Configured authentication and authorization with <strong>role-based access control</strong>.</li>
                <li>Collaborated with other team members on creating the <strong>REST API</strong> with JWT token authentication.</li>
                <li>Used <strong>HTML</strong>, <strong>Bootstrap CSS</strong>, <strong>jQuery</strong> and <strong>JavaScript</strong> to create front end views.</li>
                <li>Created dynamic map and chart pages using <strong>AJAX</strong>.</li>
            </ul>
            <a href="{{URL::to("db_applications/zlyne")}}">More info.</a>

            <h3>Discount Two-Way Radio (August 2007 - July 2015, Harbor City, CA)</h3>
            <p><strong>Position: </strong> Front End Web Developer</p>
            <p>Duties:</p>
            <ul>
                <li>Elicited the requirements and analyzed the business logic to offer solutions, which improved common processes inside company’s ERP and CRM system (Netsuite).</li>
                <li>Implemented heavy back end customizations to Netsuite using <strong>JavaScript</strong>.</li>
                <li>Used <strong>REST API</strong> to integrate Netsuite with other web services.</li>
                <li>Built websites’ front end with <strong>HTML</strong>, <strong>CSS</strong>, <strong>jQuery</strong>, <strong>JavaScript</strong> and Netsuite as a back end.</li>
                <li>Rebuilt websites to utilize Magento with <strong>PHP</strong>, <strong>HTML</strong>, <strong>CSS</strong>, <strong>jQuery</strong> and <strong>JavaScript</strong>.</li>
                <li>Integrated Netsuite with Magento websites using <strong>SOAP</strong>.</li>
                <li>Created a Windows desktop application using <strong>C#</strong> and <strong>XML</strong>.</li>
                <li>Trained newcomers.</li>
            </ul>
            <a href="https://www.discounttwo-wayradio.com">www.discounttwo-wayradio.com</a>
        </div>
    </div>

    <h2>Projects</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>Web Application for Shared Science (September 2015 - February 2016, Long Beach, CA)</h3>
            <p>Shared Science required a database application, which allowed them to import data using CSV and generate custom reports based on that data.
            Shared Science admin users requested the ability to filter the data they wanted to see and a way to customize the look of the reports.
            </p>
            <ul>
                <li>Set up MySQL database.</li>
                <li>Used Laravel <strong>MVC</strong> framework to create models, views, controllers and other project files in <strong>PHP</strong>.</li>
                <li>Used third party modules together with custom code to create <strong>CSV</strong> import functionality.</li>
                <li>Built a module to allow custom queries into the database using <strong>jQuery</strong> UI and <strong>PHP</strong>.</li>
                <li>Utilized a Laravel plugin to allow to store Blade templates into the database and apply them to reports in order to change their look.</li>
                <li>Used <strong>HTML</strong>, <strong>Bootstrap CSS</strong>, <strong>jQuery</strong> and <strong>JavaScript</strong> to create front end views.</li>
            </ul>
            <a href="{{URL::to("db_applications/shared_science")}}">More info.</a>

            <h3>Tod Turtle (March 2015 - April 2015, Long Beach, CA)</h3>
            <p>Educational games / tutorials for children and adults, who want to become familiar with computer programming.</p>
            <ul>
                <li>Learned <strong>LOGO</strong> programming language, which was utilized by the original turtle graphics software.</li>
                <li>Used <strong>TouchDevelop</strong> to create turtle tutorials for beginners in computer science.</li>
                <li>Used <strong>HTML</strong>, <strong>CSS</strong> and <strong>JavaScript</strong> to create a website for Tod Turtle project.</li>
            </ul>
            <a href="{{URL::to("http://todturtle.byethost14.com")}}">More info.</a>

        </div>
    </div>

@stop
@section('body_bottom')
@stop