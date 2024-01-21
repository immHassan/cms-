<?php


namespace App\Exceptions;

use Exception;
class CheckedOptionsException extends Exception
{
    /**
     * Create a new instance
     */
    public function __construct()
    {
        parent::__construct('You can not create question with all options checkable');
    }
}