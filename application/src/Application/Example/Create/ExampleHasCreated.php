<?php

declare(strict_types=1);

namespace App\Application\Example\Create;

use App\Domain\EventMessage;

class ExampleHasCreated implements EventMessage
{
    private string $title;
    private string $description;
    private string $createdAt;
    private string $ocurredOn;

    public function __construct(string $title, string $description, string $createdAt)
    {
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->ocurredOn = (new \DateTimeImmutable())->format(\DateTimeImmutable::ATOM);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function ocurredOn(): string
    {
        return $this->ocurredOn;
    }
}
