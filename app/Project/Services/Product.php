<?php

namespace App\Project\Services;

use App\Project\Entities\Product as ProductModel;
use App\Project\Exceptions\Product\ProductNotCreatedException;

class Product
{
  /**
   * @var \Product
   */
  private $product;

  /**
   * Product constructor.
   * @param \App\Project\Entities\Product $product
   */
  public function __construct(ProductModel $product) {

    $this->product = $product;
  }

  /**
   * @param $productDetails
   * @return static
   * @throws \App\Project\Exceptions\Product\ProductNotCreatedException
   */
  public function create($productDetails) {
    $product = $this->product->newInstance($productDetails);
    if(!$product->save()) {
      throw new ProductNotCreatedException();
    }
    return $product;
  }


  public function all() {
    return $this->product
      ->orderBy('created_at', 'desc');
  }
}