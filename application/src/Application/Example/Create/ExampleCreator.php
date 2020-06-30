<?php

declare(strict_types=1);

namespace App\Application\Example\Create;

use App\Domain\EventBus;
use App\Domain\Example\Description;
use App\Domain\Example\Example;
use App\Domain\Example\ExampleRepository;
use App\Domain\Example\Title;
use DateTimeImmutable;

class ExampleCreator
{
    private ExampleRepository $exampleRepository;
    private EventBus $eventBus;

    public function __construct(ExampleRepository $exampleRepository, EventBus $eventBus)
    {
        $this->exampleRepository = $exampleRepository;
        $this->eventBus = $eventBus;
    }

    public function dispatch(Title $title, Description $description, DateTimeImmutable $createdAt) : void
    {
        $example = new Example($title, $description, $createdAt);
        $this->exampleRepository->save($example);
        $this->eventBus->dispatch(new ExampleHasCreated(
            (string) $title,
            (string) $description,
            $createdAt->format(DateTimeImmutable::ATOM)
        ));
    }
}
