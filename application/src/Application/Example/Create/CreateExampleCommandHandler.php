<?php

declare(strict_types=1);

namespace App\Application\Example\Create;

use DateTimeImmutable;
use App\Domain\Example\Title;
use App\Domain\Example\Description;

class CreateExampleCommandHandler
{
    private ExampleCreator $exampleCreator;

    public function __construct(ExampleCreator $exampleCreator)
    {
        $this->exampleCreator = $exampleCreator;
    }

    public function __invoke(CreateExampleCommand $createCommand)
    {
        $this->exampleCreator->dispatch(
            new Title($createCommand->title()),
            new Description($createCommand->description()),
            new DateTimeImmutable($createCommand->creationDate())
        );
    }
}
