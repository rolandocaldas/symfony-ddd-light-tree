<?php

declare(strict_types=1);

namespace App\Application\Example\Create;

use App\Domain\Command;

class CreateExampleCommand implements Command
{
    private string $title;
    private string $description;
    private string $creationDate;

    public function __construct(string $title, string $description, string $creationDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->creationDate = $creationDate;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function creationDate() : string
    {
        return $this->creationDate;
    }
}
