<?php

namespace App\Containers\Zooms\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class TimeSlotBusyException extends Exception
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public $message = 'Time slot is busy and ran out of account';

}
