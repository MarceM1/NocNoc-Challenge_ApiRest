<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'assigned_user_id' => $this->assigned_user_id,
            'user_id' => $this->id,
            'comment'=> CommentResource::collection($this->whenLoaded('comment')),
            'file'=> FileResource::collection($this->whenLoaded('file')),

        ];
    }
}
