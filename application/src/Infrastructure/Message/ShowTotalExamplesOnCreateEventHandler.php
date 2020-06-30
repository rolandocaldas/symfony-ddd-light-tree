<?php

declare(strict_types=1);

namespace App\Infrastructure\Message;

use App\Application\Example\Create\ExampleHasCreated;
use App\Application\Example\Obtain\ObtainAllQuery;
use App\Domain\QueryBus;

class ShowTotalExamplesOnCreateEventHandler
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(ExampleHasCreated $exampleHasCreated)
    {
        dump("Total examples: " . count($this->queryBus->dispatch(new ObtainAllQuery())));
    }
}