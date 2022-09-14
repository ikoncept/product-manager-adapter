<?php

namespace Ikoncept\ProductManagerAdapter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Infab\Core\Traits\ApiControllerTrait;

class ProductController extends Controller
{
    use ApiControllerTrait;

    protected $allowedQueryParamKeys = [
        'include', 'filter', 'number',
    ];

    public function index(Request $request): JsonResponse
    {
        $key = config('product-manager-adapter.key');
        $queryParams = $request->only($this->allowedQueryParamKeys);
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => 'en',
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/products', $queryParams);

        return $this->respondWithArray($response->json());
    }

    public function show(Request $request, string $sku): JsonResponse
    {
        $key = config('product-manager-adapter.key');
        $queryParams = $request->only($this->allowedQueryParamKeys);
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => 'en',
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/products/'.$sku.'/sku', $queryParams);

        return $this->respondWithArray($response->json());
    }
}
