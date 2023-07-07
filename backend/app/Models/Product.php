<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function productCustomize():HasMany {
        return $this->hasMany(ProductCustomize::class);
    }
    public function orderDetails():BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function store():BelongsTo {
        return $this->belongsTo(Store::class);
    }

}
