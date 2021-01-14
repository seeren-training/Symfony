<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CorsRequestSubscriber implements EventSubscriberInterface
{

    private array $cors;

    public function __construct(array $cors)
    {
        $this->cors = $cors;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if ('OPTIONS' === $_SERVER['REQUEST_METHOD']) {
            $response = new Response();
            $response->headers->add($this->cors);
            $response->send();
            $event->getKernel()->terminate($event->getRequest(), $response);
            exit();
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }

}
