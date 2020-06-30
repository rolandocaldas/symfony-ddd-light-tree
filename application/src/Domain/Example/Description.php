<?php

declare(strict_types=1);

namespace App\Domain\Example;

class Description
{
    private const MAX_LENGTH = 50;

    private string $value;

    public function __construct(string $description)
    {
        $this->hasValidLengthOrFail($description);
        $this->value = $description;
    }

    private function hasValidLengthOrFail(string $description)
    {
        $descriptionLength = strlen($description);
        if ($descriptionLength > self::MAX_LENGTH) {
            throw new DescriptionLengthException(self::MAX_LENGTH);
        }
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isSameAs(Description $description) : bool
    {
        return $this->value === $description->value;
    }

}
