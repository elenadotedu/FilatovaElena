<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FilatovaElena\Facades\Bugs;

class TestController extends Controller
{
    //
    public function test(Request $request) {
       // dd($request->session());
        return Bugs::get();
    }

    public function test2(Request $request)
    {
        Bugs::kill('bug5');
    }
}
