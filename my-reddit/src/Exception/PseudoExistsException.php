<?php

namespace App\Exception;

use Throwable;

class PseudoExistsException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Pseudo exists", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
