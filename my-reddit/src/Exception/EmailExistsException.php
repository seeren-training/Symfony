<?php

namespace App\Exception;

use Throwable;

class EmailExistsException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Email exists", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
