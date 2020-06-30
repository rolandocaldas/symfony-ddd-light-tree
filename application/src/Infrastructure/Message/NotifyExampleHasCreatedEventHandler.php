<?php

declare(strict_types=1);

namespace App\Infrastructure\Message;

use App\Application\Example\Create\ExampleHasCreated;

class NotifyExampleHasCreatedEventHandler
{
    public function __invoke(ExampleHasCreated $exampleHasCreated)
    {
        dump(NotifyExampleHasCreatedEventHandler::class);
    }
}