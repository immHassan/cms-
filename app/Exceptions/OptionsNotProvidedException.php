<?php

namespace App\Exceptions;

use Exception;

class OptionsNotProvidedException extends Exception
{
    /**
     * Create a new instance
     */
    public function __construct()
    {
        parent::__construct('You can not create question without providing options');
    }
}
