<?php

namespace App\Http\Resources;

use App\Models\RateUser;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'is_subscribed' => in_array($this->id, auth()->user()->subscribedRates->pluck('id')->toArray())
        ];
    }
}
