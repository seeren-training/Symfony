<?php

namespace App\Exception;

use Throwable;

class InvalidFormException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Invalid form", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
