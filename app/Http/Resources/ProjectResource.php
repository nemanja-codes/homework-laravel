<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'project';
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'priority' => $this->resource->priority,
            'client' => $this->resource->client,
            'user' => new UserResource($this->resource->user)


           ];
    }
}
