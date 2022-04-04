<?php

namespace App\Http\Resources;

class ThreadResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            // 'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            // 'created_at' => $this->created_at->toDateTimeString(),
            // 'updated_at' => $this->updated_at->toDateTimeString(),
            // 'author' => $this->author,
            'author' => new UserResource($this->author),
        ];
    }
}
