<?php

declare(strict_types=1);

namespace App\Application\Example\Obtain;

class Example
{
    private string $title;
    private string $description;
    private string $createdAt;

    private function __construct() {}

    public static function fromEntity(\App\Domain\Example\Example $example) : Example
    {
        $object = new self();
        $object->title = (string) $example->title();
        $object->description = (string) $example->description();
        $object->createdAt = $example->createdAt()->format(\DateTimeImmutable::ATOM);

        return $object;
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
}
