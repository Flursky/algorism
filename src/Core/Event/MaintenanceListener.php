<?php


namespace App\Core\Event;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Twig\Environment;

class MaintenanceListener
{

    private $twig;
    private $isLocked;

    public function __construct(Environment $twig, $isLocked) {

        $this->twig = $twig;
        $this->isLocked = $isLocked;
    }

    /**
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        if (!$this->isLocked) {
            return;
        }


        $event->setResponse(
            new Response("Website In Maintenance", Response::HTTP_SERVICE_UNAVAILABLE)
        );
        $event->stopPropagation();
    }
}