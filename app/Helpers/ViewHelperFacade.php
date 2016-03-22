<?php namespace App\Helpers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Helpers\FormHelper
 */
class ViewHelperFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'viewHelper'; }

}