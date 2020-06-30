<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus;

use App\Domain\Query;
use App\Domain\QueryBus;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class SymfonyMessengerQueryBus implements QueryBus
{
    private MessageBusInterface $queryBus;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function dispatch(Query $query)
    {
        $queryDispatched = $this->queryBus->dispatch($query)->last(HandledStamp::class);
        if (null === $queryDispatched) {
            return null;
        }

        return $queryDispatched->getResult();
    }
}
