<?php

namespace App\Http\Controllers;

use App\Domain\Models\Example;
use App\Services\ExampleService;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * @var ExampleService
     */
    private $exampleService;

    /**
     * ExampleController constructor
     * @param ExampleService $exampleService
     */
    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
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

        return response()->json($example, 200);
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

        return response()->json($example, 200);
    }
}
