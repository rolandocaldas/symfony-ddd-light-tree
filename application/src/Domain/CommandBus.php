<?php

declare(strict_types=1);

namespace App\Domain;

interface CommandBus
{
    public function dispatch(Command $command) : void;
}
