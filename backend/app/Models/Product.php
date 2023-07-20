<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'barcode',
        'description',
        'image',
        'is_active'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function storeProduct($request, $id = null)
    {
        $product = $request->only(['category_id', 'name', 'barcode', 'description', 'image', 'is_active']);
        $product['store_id'] = Auth::user()->store->id;
        $product = self::updateOrCreate(['id' => $id], $product);
        return $product;
    }

    public function productCustomize(): HasMany
    {
        return $this->hasMany(ProductCustomize::class);
    }

    public function orderDetails(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
