<?php


namespace Iyngaran\Category\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LazyCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'icon' => $this->icon,
            'image' => $this->image,
            'banner' => $this->banner,
            'small_description' => $this->small_description,
            'detail_description' => $this->detail_description,
            'display_order' => $this->display_order,
        ];
    }
}
