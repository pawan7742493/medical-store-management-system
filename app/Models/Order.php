<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'order_number',
        'total_amount',
        'shipping_address',
        'city',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function invoice()
   {
    return $this->hasOne(Invoice::class);
   }
}