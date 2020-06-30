<?php

declare(strict_types=1);

namespace App\Domain\Example;

interface ExampleRepository
{
    public function save(Example $example) : void;

    /**
     * @return Example[]
     */
    public function obtainAll() : array;
}
