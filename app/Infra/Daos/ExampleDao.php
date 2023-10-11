<?php

namespace App\Infra\Daos;

use App\Domain\Models\Example;
use App\Models\Example as EloquentExample;
use App\Domain\Repositories\ExampleRepository;

class ExampleDao implements ExampleRepository
{
    public function findById(int $id): ?Example
    {
        $eloquentExample = EloquentExample::find($id);
        if ($eloquentExample === null) {
            return null;
        }

        return new Example(
            $eloquentExample->id,
            $eloquentExample->name
        );
    }

    public function save(Example $example): Example
    {
        $eloquentExample = EloquentExample::create([
            'name' => $example->jsonSerialize()['name'],
        ]);

        return new Example(
            $eloquentExample->id,
            $eloquentExample->name
        );
    }
}
