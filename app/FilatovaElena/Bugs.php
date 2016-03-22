<?php namespace App\FilatovaElena;

/*------------------------------------------------------
| Handles bugs available on the site
--------------------------------------------------------*/

use Illuminate\Support\Facades\Request;

class Bugs
{
    protected $__session_name = 'bugs';
    protected $__count = 20;
    
    public function __construct()
    {
        $this->init();
    }

    public function init() {

        $session = Request::session();

        // if session doesn't yet contain bugs
        if (!$session->has($this->__session_name))
        {
            $bugs = [];

            for($i = 0; $i < $this->__count; $i++) {

                $bugs['bug'.$i] = true;
            }
            $session->put($this->__session_name, $bugs);
        }
    }

    public function get()
    {
        return Request::session()->get($this->__session_name);
    }

    public function isAlive($id)
    {
        $bugs = $this->get();

        if (array_key_exists($id, $bugs) && $bugs[$id])
        {
            return true;
        }
        return false;
    }

    public function kill($id)
    {
        $bugs = $this->get();

        if (array_key_exists($id, $bugs)) {

            $this->delete();
            $bugs[$id] = false;

            Request::session()->put($this->__session_name, $bugs);

            return true;
        }
        return false;
    }

    public function aliveCount()
    {
        $bugs = $this->get();
        $count = 0;

        foreach($bugs as $bug => $alive)
        {
            if ($alive) {

                $count ++;
            }
        }

        return $count;
    }

    public function deadCount() {
        return $this->totalCount() - $this->aliveCount();
    }

    public function totalCount() {
        return $this->__count;
    }

    public function delete() {
        Request::session()->forget($this->__session_name);
    }
}