<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use App\Application\Example\Obtain\Example;
use App\Application\Example\Obtain\ObtainAllQuery;
use App\Domain\QueryBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AllExamplesCommand extends Command
{
    protected static $defaultName = 'app:all-examples';

    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus, string $name = null)
    {
        $this->queryBus = $queryBus;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        /** @var Example[] $examples */
        $examples = $this->queryBus->dispatch(new ObtainAllQuery());
        $exampleList = [];

        foreach ($examples AS $example) {
            $exampleList[] = [
                'title' => $example->title(),
                'description' => $example->description(),
                'createdAt' => $example->createdAt()
            ];
        }

        $io->table(
            array_keys($exampleList[0]),
            $exampleList
        );

        return Command::SUCCESS;
    }
}