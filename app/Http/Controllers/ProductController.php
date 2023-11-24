<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();

        return Inertia::render(
            'Product/Index',
            [
                'products' => $products
            ]
        );
    }

    public function create()
    {
        return Inertia::render('Product/Create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $this->productService->createProduct($data);

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);

        return Inertia::render(
            'Product/Edit',
            [
                'product' => $product
            ]
        );
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        $this->productService->updateProduct($id, $data);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return redirect()->route('product.index');
    }
}
