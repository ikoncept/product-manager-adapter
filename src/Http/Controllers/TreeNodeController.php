<?php

namespace Ikoncept\ProductManagerAdapter\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Infab\Core\Traits\ApiControllerTrait;

class TreeNodeController extends Controller
{
    use ApiControllerTrait;

    protected $allowedQueryParamKeys = [
        'include', 'filter',
    ];

    public function show(Request $request, int $id): JsonResponse
    {
        $queryParams = $request->only($this->allowedQueryParamKeys);
        $key = config('product-manager-adapter.key');
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => $request->header('X-LOCALE', 'en'),
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/admin/tree-nodes/'.$id, $queryParams);

        return $this->respondWithArray($response->json());
    }
}
