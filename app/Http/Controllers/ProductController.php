<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Product\ProductFilterService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductController extends Controller
{
    /**
     * GET /products
     * Paginated product list with resource formatting.
     */
    public function index(ProductFilterRequest $request, ProductFilterService $filters)
    {
        $query = Product::query();

        $query = $filters->applyFilters($query, [
            'category'      => $request->category,
            'stock_status'  => $request->stock_status,
            'min_price'     => $request->min_price,
            'max_price'     => $request->max_price,
            'sort'          => [
                'sort_by'  => $request->sort_by,
                'sort_dir' => $request->sort_dir,
            ]
        ]);

        return ProductResource::collection(
            $query->paginate($request->per_page ?? 10)
                ->appends($request->query())
        );
    }


    /**
     * POST /products
     * Store a new product with proper validation & error handling.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            return response()->json([
                'message' => 'Product created successfully',
                'data'    => new ProductResource($product),
            ], ResponseAlias::HTTP_CREATED);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create product',
                'error'   => $e->getMessage(),
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
