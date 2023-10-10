<?php

namespace App\Services;

use App\Domain\Models\Example;
use App\Domain\Repositories\ExampleRepository;

class ExampleService
{
    private $exampleRepository;

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * Get Example By ID
     * @param int id
     * @return Example|null
     */
    public function getExampleById(int $id): ?Example
    {
        return $this->exampleRepository->findById($id);
    }

    /**
     * Create Example
     * @param string name
     * @return Example|null 
     */
    public function createExample(string $name): ?Example
    {
        $example = new Example(0, $name);

        return $this->exampleRepository->save($example);
    }
}
