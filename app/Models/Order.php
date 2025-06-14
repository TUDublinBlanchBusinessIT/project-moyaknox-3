<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'bouquet_id', 'order_date', 'special_requests', 'delivery_method', ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class);
    }
}
