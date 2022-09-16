<?php

namespace Ikoncept\ProductManagerAdapter\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Infab\Core\Traits\ApiControllerTrait;

class ProductTreeController extends Controller
{
    use ApiControllerTrait;

    public function index(Request $request): JsonResponse
    {
        // $eagerLoad = $this->getEagerLoad([]);
        // $productTree = QueryBuilder::for(ProductTree::class)
        //     ->allowedSorts(['id', 'created_at'])
        //     ->allowedFilters([])
        //     ->with($eagerLoad)
        //     ->paginate($this->number);
        $key = config('product-manager-adapter.key');
        $response = Http::accept('application/json')
            ->withHeaders([
                'Authorization' => 'Bearer '.$key,
                'X-LOCALE' => $request->header('X-LOCALE', 'en'),
            ])
            ->get(config('product-manager-adapter.endpoint').'/api/admin/product-trees');

        return $this->respondWithArray($response->json());
    }
}
