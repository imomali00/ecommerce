<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValueResource extends JsonResource
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
//            'valueable_type' => $this->valueable_type,
//            'valueable_id' => $this->valueable_id,
            'name' => $this->getTranslations('name')
        ];
    }
}
