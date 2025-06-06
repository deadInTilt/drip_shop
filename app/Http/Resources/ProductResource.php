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
    public function toArray($request): array
    {
        return [
           'title'=> $this->title,
           'description' => $this->description,
           'price'=> $this->price,
           'quantity' => $this->quantity,
           'brand' => $this->brand->title,
           'category' => $this->category->title,
           'tags' => $this->tags->pluck('title')->toArray(),
           'image_url' => $this->preview_image,
        ];
    }
}
