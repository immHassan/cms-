<?php

namespace App\Exceptions;

use Exception;

class OptionsInvalidNumberProvidedException extends Exception
{
    /**
     * Create a new instance
     */
    public function __construct()
    {
        parent::__construct('A question must be composed of two options at least');
    }
}