<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id'=>$this->id,
            'store_id'=> new StoreResource($this->store_id),
            'category_id'=> new CategoryResource($this->category_id),
            'name'=>$this->name,
            'barcode'=>$this->barcode,
            'description'=>$this->description,
            'image'=>$this->image,
            'quantity'=>$this->quantity,
            'is_active'=>$this->is_active
        ];
    }
}
