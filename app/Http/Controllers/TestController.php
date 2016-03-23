<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FilatovaElena\BugsFacade as Bugs;

class TestController extends Controller
{
    //
    public function test(Request $request) {
       // dd($request->session());
        $path = realpath("Jugs.exe");
        if (!$path)
            $path = "./Jugs";

        dd($path);
        dd(exec($path." 2 5 3 0 0 4 0"));
    }

    public function test2(Request $request)
    {
        Bugs::kill('bug5');
    }
}
