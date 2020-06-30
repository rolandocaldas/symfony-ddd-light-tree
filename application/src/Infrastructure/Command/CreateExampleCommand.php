<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use App\Domain\CommandBus;
use DateTimeImmutable;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;

class CreateExampleCommand extends Command
{
    protected static $defaultName = 'app:create-example';

    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus, string $name = null)
    {
        $this->commandBus = $commandBus;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->addOption('title', 't', InputOption::VALUE_REQUIRED, '')
            ->addOption('description', 'd', InputOption::VALUE_REQUIRED, '');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $title = $input->getOption('title');
        $description = $input->getOption('description');

        if (!$title || !$description) {
            $io->error('Title and description are require values');
            return Command::FAILURE;
        }

        try {
            $this->commandBus->dispatch(new \App\Application\Example\Create\CreateExampleCommand(
                $title,
                $description,
                (new DateTimeImmutable())->format(DateTimeImmutable::ATOM)
            ));

            $io->success('Example created');
        } catch (Throwable $e) {
            $io->error($e->getMessage());
        }

        return Command::SUCCESS;
    }
}