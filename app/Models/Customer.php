<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Order;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'customer_type',
        'customer_name',
        'shop_name',
        'mobile',
        'email',
        'address',
        'city',
        'gst_number',
        'drug_license_number',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
   {
    return $this->hasMany(Order::class);
   }

}