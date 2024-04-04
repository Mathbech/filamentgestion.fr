<?php
// src/App/EventListener/JWTCreatedListener.php
namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\SecurityBundle\Security;

class JWTCreatedListener
{
    private $requestStack;


    public function __construct(RequestStack $requestStack, Security $security)
    {
        $this->requestStack = $requestStack;
        $this->security = $security;
    }

    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();

        $user = $this->security->getUser();

        if ($user) {
            $payload['userId'] = $user->getId();
        }
        
       
        $event->setData($payload);

        $header = $event->getHeader();
        $header['id'] = 'JWT';

        $event->setHeader($header);
    }
}
