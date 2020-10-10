<?php

namespace App\Service\AppCore;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class CSRFValidator
{

    /**
     * @var CsrfTokenManagerInterface
     */
    private CsrfTokenManagerInterface $tokenManager;

    /**
     * @param CsrfTokenManagerInterface $tokenManager
     */
    public function __construct(CsrfTokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * @param string $id
     * @param string $value
     * @return bool
     *
     * @throws AccessDeniedException
     */
    public function validate(string $id, string $value): bool
    {
        if (!$this->tokenManager->isTokenValid(new CsrfToken($id, $value))) {
            throw new AccessDeniedException('CSRF token "' . $id . '" is not valid');
        };
        return true;
    }

}
