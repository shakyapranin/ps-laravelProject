<?php

namespace App\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

  protected $fillable = ['name', 'price'];

  protected $appends = ['created_at', 'deleted_at'];
}