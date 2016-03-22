<?php namespace App\FilatovaElena;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Helpers\FormHelper
 */
class BugsFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'bugs'; }

}