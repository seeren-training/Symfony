<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CorsResponseSubscriber implements EventSubscriberInterface
{

    private array $cors;

    public function __construct(array $cors)
    {
        $this->cors = $cors;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $event->getResponse()->headers->add($this->cors);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.response' => 'onKernelResponse',
        ];
    }

}
