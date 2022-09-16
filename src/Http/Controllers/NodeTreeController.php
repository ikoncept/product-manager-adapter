<?php

namespace Ikoncept\ProductManagerAdapter\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Infab\Core\Traits\ApiControllerTrait;

class NodeTreeController extends Controller
{
    use ApiControllerTrait;

    protected $allowedQueryParamKeys = [
        'selectOptions',
    ];

    public function index(Request $request, int $id): JsonResponse
    {
        $key = config('product-manager-adapter.key');
        $queryParams = $request->only($this->allowedQueryParamKeys);
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => $request->header('X-LOCALE', 'en'),
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/admin/node-trees/'.$id, $queryParams);

        return $this->respondWithArray($response->json());
    }
}
