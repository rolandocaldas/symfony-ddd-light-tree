<?php

declare(strict_types=1);

namespace App\Domain;

interface EventBus
{
    public function dispatch(EventMessage $message) : void;
}