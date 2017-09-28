<?php

namespace App\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
  /**
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * @return array
   */
  public function rules() {
    return [
      'name' => 'required',
      'price' => 'required|integer',
    ];
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'name.required' => 'Product name is required.',
      'price.required' => 'Product price is require.',
      'price.integer' => 'Product price must be integer.',
    ];
  }
}