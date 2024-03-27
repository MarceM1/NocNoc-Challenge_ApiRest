<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'file_uri' => $this->file_uri,
            'type' => $this->type,
            'size' => $this->size,
            'task_id' => $this->task_id,
            'user_id' => $this->user_id,
        ];
    }
}
