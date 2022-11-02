<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{


    public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'author' => $this->user->name,
                'image' => [
                    'full' => $this->image['big'],
                    'full_webp' => $this->image['big_webp'],
                    'cropped' => $this->image['cropped'],
                    'cropped_webp' => $this->image['cropped_webp'],
                ],
                'content' => $this->content,
                'created_at' => $this->created_at->diffForHumans(),
                'category' => $this->category->name
            ];
    }
}
