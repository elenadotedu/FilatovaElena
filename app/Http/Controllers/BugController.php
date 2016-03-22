<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FilatovaElena\BugsFacade as Bugs;

class BugController extends Controller
{
    /**
     * Check if a particular bug is alive by bug id
     * @param $id   string id of the bug (ex. bug0)
     * @return mixed    true or false
     */
    public function isAlive(Request $request) {
        $id = $request->id;
        return response()->json(Bugs::isAlive($id));
    }

    /**
     * Kill a particular bug by bug id
     * @param $id   string id of the bug (ex. bug1)
     * @return mixed    true or false
     */
    public function kill(Request $request) {
        $id = $request->id;
        return response()->json(Bugs::kill($id));
    }

    /**
     * Get all bugs
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        return response()->json(Bugs::get());
    }

    /**
     * Get the number of alive bugs
     * @return \Illuminate\Http\JsonResponse
     */
    public function aliveCount()
    {
        return response()->json(Bugs::aliveCount());
    }

    /**
     * Get the number of dead bugs
     * @return \Illuminate\Http\JsonResponse
     */
    public function deadCount()
    {
        return response()->json(Bugs::deadCount());
    }
}
