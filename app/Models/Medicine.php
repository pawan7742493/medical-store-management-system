<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Medicine extends Model
{

public function category()
{
    return $this->belongsTo(Category::class);
}

    protected $fillable = [

'category_id',

'medicine_name',

'company_name',

'batch_no',

'expiry_date',

'purchase_price',

'wholesale_price',

'retail_price',

'stock',

'minimum_stock',

'description',

'status'

];



}
