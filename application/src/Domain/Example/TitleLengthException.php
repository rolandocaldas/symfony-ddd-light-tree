<?php

declare(strict_types=1);

namespace App\Domain\Example;

use InvalidArgumentException;

class TitleLengthException extends InvalidArgumentException
{
    public function __construct(int $minLength, int $maxLength)
    {
        parent::__construct('Title must be a length between ' . $minLength . ' and ' . $maxLength . ' chars');
    }
}
