<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JugSolverController extends Controller
{
    /**
     * Show jug sover page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jug_solver.index');
    }

    /**
     *  Execute Jugs.exe and return results.
     *
     * @return array
     */
    public function exe(Request $request)
    {
        $num_jugs = $request->num_jugs;
        $capacities = $request->capacities;
        $goal = $request->goal;

        // set number of jugs
        $param_string = $num_jugs." ";

        // set capacities and figure out max capacity index
        $max_jug_capacity = 0;
        $max_jug_index = 0;
        for ($i = 0; $i < $num_jugs; $i++)
        {
            $capacity = $capacities[$i];
            $param_string = $param_string.$capacity." ";

            // reset max capacity
            if ($capacity > $max_jug_capacity)
            {
                $max_jug_capacity = $capacity;
                $max_jug_index = $i;
            }
        }

        // set all intial values to 0
        for ($i = 0; $i < $num_jugs; $i++)
        {
            $param_string = $param_string."0 ";
        }

        // set goal
        $param_string = $param_string.$goal." ";

        // set goal jug (max capacity index)
        $param_string = $param_string.$max_jug_index;

        $output = [];
        $return = [];

        exec("Jugs ".$param_string, $output, $return);

        return [
            "output" => $output,
            "return" => $return
        ];
    }
}
