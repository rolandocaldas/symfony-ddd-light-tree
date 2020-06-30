<?php

declare(strict_types=1);

namespace App\Domain\Example;

use DateTimeImmutable;

class Example
{
    private int $id;
    private Title $title;
    private Description $description;
    private DateTimeImmutable $createdAt;

    public function __construct(Title $title, Description $description, DateTimeImmutable $createdAt)
    {
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = $createdAt;
    }

    public function __toString()
    {
        return (string) $this->title;
    }

    public function title() : Title
    {
        return $this->title;
    }

    public function changeTitle(Title $title) : self
    {
        $this->title = $title;
        return $this;
    }

    public function description() : Description
    {
        return $this->description;
    }

    public function changeDescription(Description $description) : self
    {
        $this->description = $description;
        return $this;
    }

    public function createdAt() : DateTimeImmutable
    {
        return $this->createdAt;
    }
}