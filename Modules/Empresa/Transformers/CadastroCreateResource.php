<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CadastroCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status
        ];
    }
}
