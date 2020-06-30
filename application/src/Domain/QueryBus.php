<?php

declare(strict_types=1);

namespace App\Domain;

interface QueryBus
{
    public function dispatch(Query $query);
}
