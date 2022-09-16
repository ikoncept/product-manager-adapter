<?php

namespace Ikoncept\ProductManagerAdapter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Infab\Core\Traits\ApiControllerTrait;

class TreeNodeSlugsController extends Controller
{
    use ApiControllerTrait;

    protected $allowedQueryParamKeys = [
        'include',
    ];

    public function show(Request $request, string $slug): JsonResponse
    {
        $queryParams = $request->only($this->allowedQueryParamKeys);
        $key = config('product-manager-adapter.key');
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => $request->header('X-LOCALE', 'en'),
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/tree-nodes/'.$slug, $queryParams);

        return $this->respondWithArray($response->json());
    }
}
