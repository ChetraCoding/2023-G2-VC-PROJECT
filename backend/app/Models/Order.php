<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'store_id',
        'table_id',
        'datetime'
    ];
    public function store():BelongsTo{
        return $this->belongsTo(Store::class);
    }
    public function table():BelongsTo{
        return $this->belongsTo(Table::class);
    }
    public function orderDetail():BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
