<?php

declare(strict_types=1);

namespace App\Application\Example\Obtain;

class ObtainAllQueryHandler
{
    private Finder $finder;

    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @param ObtainAllQuery $obtainAllQuery
     * @return Example[]
     */
    public function __invoke(ObtainAllQuery $obtainAllQuery)
    {
        $returnList = [];
        $exampleList = $this->finder->dispatch();

        foreach ($exampleList AS $example) {
            $returnList[] = Example::fromEntity($example);
        }

        return $returnList;
    }
}