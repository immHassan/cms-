<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Facade;
use App\Helpers\PollWriter;

class PollWriterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PollWriter::class;
    }
}
