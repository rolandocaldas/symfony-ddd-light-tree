<?php

declare(strict_types=1);

namespace App\Application\Example\Create;

use App\Domain\Example\Description;
use App\Domain\Example\Example;
use App\Domain\Example\ExampleRepository;
use App\Domain\Example\Title;
use DateTimeImmutable;

class ExampleCreator
{
    private ExampleRepository $exampleRepository;

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    public function dispatch(Title $title, Description $description, DateTimeImmutable $createdAt) : void
    {
        $example = new Example($title, $description, $createdAt);
        $this->exampleRepository->save($example);
    }
}
