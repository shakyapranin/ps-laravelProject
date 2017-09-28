<?php

namespace App\Project\Exceptions\Product;

use App\Project\Exceptions\ProjectException;
use Illuminate\Http\JsonResponse;

final class ProductNotCreatedException extends ProjectException
{
  protected $code = 'product_not_created';
  protected $status = 500;
  protected $message = 'Product could not be created.';

  /**
   * ProductNotCreatedException constructor.
   * @param null $message
   */
  public function __construct($message = null) {
    parent::__construct($message ?: $this->message);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  protected function renderJson() {
    return new JsonResponse([
      'message' => $this->message,
      'status' => $this->status,
      'code' => $this->code
    ]);
  }
}