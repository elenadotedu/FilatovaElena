<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    /* --------------------------------------------------------------------------
      Home
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('test', 'TestController@test');

    Route::get('test2', 'TestController@test2');

    /* --------------------------------------------------------------------------
      Authentication
    */

    Route::auth();

    /* --------------------------------------------------------------------------
      DB Applications
    */

    Route::get('db_applications/shared_science', ['as' => 'db_applications.shared_science', function () {
        return view('db_applications.shared_science');
    }]);

    Route::get('db_applications/zlyne', ['as' => 'db_applications.zlyne', function () {
        return view('db_applications.zlyne');
    }]);

    /* --------------------------------------------------------------------------
      Bugs
    */

    Route::get('bugs/about', ['as' => 'bugs.about', function() {
        return view('bugs.about');
    }]);

    Route::get('bugs/is_alive', ['as' => 'bugs.is_alive', 'uses' => 'BugController@isAlive']);
    Route::get('bugs/kill', ['as' => 'bugs.kill', 'uses' => 'BugController@kill']);
    Route::get('bugs/get', ['as' => 'bugs.get', 'uses' => 'BugController@get']);
    Route::get('bugs/dead_count', ['as' => 'bugs.dead_count', 'uses' => 'BugController@deadCount']);

    /* --------------------------------------------------------------------------
      Jug Solver
    */

    Route::get('jug_solver', array('as' => 'jug_solver.index', 'uses' => 'JugSolverController@index'));
    Route::post('jug_solver/exe', array('as' => 'jug_solver.exe', 'uses' => 'JugSolverController@exe'));
    Route::get('jug_solver/exe', array('as' => 'jug_solver.exe', 'uses' => 'JugSolverController@exe'));

    /* --------------------------------------------------------------------------
      Playground
    */


    Route::get('turtle_playground', function() {
        return view('turtle.playground');
    });

    /* --------------------------------------------------------------------------
      JavaScript Tools
    */

    Route::get('js_validators_name', function() {
        return view('js_validators.name');
    });

    Route::get('js_validators_address', function() {
        return view('js_validators.address');
    });

    Route::get('js_validators_other', function() {
        return view('js_validators.other');
    });

    /* --------------------------------------------------------------------------
      Why so green
    */

    Route::get('why_so_green', function() {
        return view('why_green');
    });

    /* --------------------------------------------------------------------------
      Contact
    */

    Route::get('contact', function() {
        return view('contact');
    });

});