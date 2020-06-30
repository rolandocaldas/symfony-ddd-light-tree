<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Domain\EventBus;
use App\Domain\EventMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class SymfonyMessengerEventBus implements EventBus
{
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function dispatch(EventMessage $message): void
    {
        $this->eventBus->dispatch($message);
    }
}
