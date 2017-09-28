<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Resources\ProductResource;
use App\Project\Requests\ProductRequest;
use App\Project\Services\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

class ProductController extends LoginController
{
  /**
   * @var \App\Project\Services\Product
   */
  private $productService;

  /**
   * ProductController constructor.
   * @param \App\Project\Services\Product $productService
   */
  public function __construct(Product $productService) {

    $this->productService = $productService;
  }

  public function index(Request $request) {
    return new ProductCollection($this->productService
      ->all()
      ->paginate($request->get('per_page', config('project.defaultPaginationLimit')))
    );
  }

  public function store(ProductRequest $request) {
    return new ProductResource($this->productService->create($request->all()));
  }
}