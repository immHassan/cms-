<?php

namespace App\Exceptions;

use Exception;

class DuplicatedOptionsException extends Exception
{
    /**
     * Create a new instance
     */
    public function __construct()
    {
        parent::__construct('You provided a duplicated options');
    }
}
