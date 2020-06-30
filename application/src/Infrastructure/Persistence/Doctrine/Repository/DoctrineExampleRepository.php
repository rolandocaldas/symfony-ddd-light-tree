<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Example\Description;
use App\Domain\Example\Example;
use App\Domain\Example\ExampleRepository;
use App\Domain\Example\Title;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineExampleRepository extends ServiceEntityRepository implements ExampleRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Example::class);
    }

    public function save(Example $example): void
    {
        return;
    }

    public function obtainAll(): array
    {
        $now = new \DateTimeImmutable();
        return [
            new Example(new Title('Lorem ipsum'), new Description('random value'), $now),
            new Example(new Title('Lorem ipsum'), new Description('random value'), $now),
            new Example(new Title('Lorem ipsum'), new Description('random value'), $now),
            new Example(new Title('Lorem ipsum'), new Description('random value'), $now),
        ];
    }


}