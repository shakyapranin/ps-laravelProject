<?php

namespace App\Project\Exceptions;

use Exception;
use Illuminate\Http\Response;

abstract class ProjectException extends Exception
{
  public function render($request) {
    if($request->wantsJson()) {
      return $this->renderJson();
    }

    return $this->renderHtml();
  }

  protected function renderHtml(){
    return new Response([
      'message' => static::getMessage(),
      'status' => static::getCode(),
      'code' => static::getCode(),
    ]);
  }

  abstract protected function renderJson();
}