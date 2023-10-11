<?php

namespace App\Http\Controllers;

use App\Domain\Models\Example;
use App\Services\ExampleService;
use App\Http\Outputs\ExampleOutput;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * @var ExampleService
     */
    private $exampleService;

    /**
     * @var ExampleOutput
     */
    private $exampleOutput;


    /**
     * ExampleController constructor
     * @param ExampleService $exampleService
     */
    public function __construct(ExampleService $exampleService,  ExampleOutput $exampleOutput)
    {
        $this->exampleService = $exampleService;
        $this->exampleOutput = $exampleOutput;
    }

    /**
     * Get Example
     * @param int id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getExample(int $id)
    {
        $example = $this->exampleService->getExampleById($id);
        if ($example === null) {
            return response()->json(['error' => 'Example not found'], 404);
        }

        $output = $this->exampleOutput->toExample($example, "Example completed");

        return response()->json($output, 200);
    }

    /**
     * Create Example
     * @param Request request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createExample(Request $request)
    {
        $data = $request->all();
        $example = $this->exampleService->createExample($data['name']);

        $output = $this->exampleOutput->toExample($example, "Example completed");

        return response()->json($output, 200);
    }
}
