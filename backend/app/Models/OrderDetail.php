<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];
    public function orders():HasMany{
        return $this->hasMany(Order::class);
    }
    public function products():HasMany{
        return $this->hasMany(Product::class);
    }
   
}
