<?php

namespace App\Containers\ZoomUser\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class ZoomUserInactiveException extends Exception
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public $message = "ZoomUser with this email existed but hasn't confirmed email";

    public $code = 1001;
}
