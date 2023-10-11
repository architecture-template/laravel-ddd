<?php

namespace App\Http\Outputs;

use App\Domain\Models\Example;

class ExampleOutput
{
    /**
     * ExampleOutput
     * @param Example Example
     * @param string message
     * @return array array
     */
    public function toExample(Example $example, string $message)
    {
        return [
            'id' => $example->jsonSerialize()['id'],
            'name' =>  $example->jsonSerialize()['name'],
            'message' => $message,
        ];
    }
}
