<?php

declare(strict_types=1);

namespace App\Domain\Example;

class Title
{
    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 50;

    private string $value;

    public function __construct(string $title)
    {
        $this->hasValidLengthOrFail($title);
        $this->value = $title;
    }

    private function hasValidLengthOrFail(string $title)
    {
        $titleLength = strlen($title);
        if ($titleLength < self::MIN_LENGTH || $titleLength > self::MAX_LENGTH) {
            throw new TitleLengthException(self::MIN_LENGTH, self::MAX_LENGTH);
        }
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isSameAs(Title $title) : bool
    {
        return $this->value === $title->value;
    }

}
