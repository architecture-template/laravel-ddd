<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Example;

interface ExampleRepository
{
    public function findById(int $id): ?Example;
    public function save(Example $example): ?Example;
}
