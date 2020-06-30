<?php

declare(strict_types=1);

namespace App\Domain\Example;

use InvalidArgumentException;

class DescriptionLengthException extends InvalidArgumentException
{
    public function __construct(int $maxLength)
    {
        parent::__construct('Description can\'t have more than ' . $maxLength . ' chars');
    }
}
