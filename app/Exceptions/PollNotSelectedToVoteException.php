<?php

namespace App\Exceptions;

use Exception;

class PollNotSelectedToVoteException extends Exception
{
    /**
     * Create a new instance
     */
    public function __construct()
    {
        parent::__construct('Question not specified to vote in');
    }
}