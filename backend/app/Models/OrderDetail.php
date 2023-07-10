<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $fillable = [
        'product_customize_id',
        'order_id',
        'quantity',
        'price'
    ];

    public function order():BelongsTo{
        return $this->belongsTo(Order::class);
    }

    public function productCustomize():BelongsTo{
        return $this->belongsTo(ProductCustomize::class);
    }

}
