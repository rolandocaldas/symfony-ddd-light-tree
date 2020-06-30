<?php

declare(strict_types=1);

namespace App\Application\Example\Obtain;

use App\Domain\Example\Example;
use App\Domain\Example\ExampleRepository;

class Finder
{
    private ExampleRepository $exampleRepository;

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * @return Example[]
     */
    public function dispatch() : array
    {
        return $this->exampleRepository->obtainAll();
    }
}