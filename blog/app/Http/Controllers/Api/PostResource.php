<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'slug'=> $this->slug,
            'title'=> strip_tags($this->title),
            'user'=> ['name' => $this->user->name, 'id' => $this->user->id],
            'content'=> strip_tags($this->content),
            'ts'=> date('Y-m-d H:i', $this->ts),
            'url'=> $this->url,
            'deleteUrl'=> $this->deleteUrl,
            'editUrl'=> $this->editUrl,
            'hasAccess' => $this->hasAccess
        ];
    }

}
