<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Category extends Model
{

  public function medicines()
{
    return $this->hasMany(Medicine::class);
}

public function products()
{
    return $this->hasMany(Product::class);
}


    protected $fillable = [
    'category_name',
    'description',
    'status'
];
}
