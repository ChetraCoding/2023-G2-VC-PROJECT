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
            'category'=> $this->category->name,
            'name'=>$this->name,
            'barcode'=>$this->barcode,
            'description'=>$this->description,
            'image'=>$this->image,
            'is_active'=>$this->is_active,
            'product_customize'=> ProductCustomizeResource::collection($this->productCustomize)
        ];
    }
}
