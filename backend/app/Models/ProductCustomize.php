<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCustomize extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'size',
        'price'
    ];

    public static function store($request, $id = null)
    {
        $productCustomize = [
            'product_id' => $request['product_id'], 
            'size' => $request['size'], 
            'price' => $request['price'], 
            'quantity' => $request['quantity']
        ];
        
        $productCustomize = self::updateOrCreate(['id' => $id], $productCustomize);

        return $productCustomize;
    }

    public function product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
}

