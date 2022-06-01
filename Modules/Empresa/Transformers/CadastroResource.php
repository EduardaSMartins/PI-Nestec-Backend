<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Cliente\Transformers\ClienteResource;
use Modules\Empresa\Entities\Empresa;

class CadastroResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'cliente'=> new ClienteResource($this->cliente),
            'empresa' => new EmpresaResource($this->empresa),
            'status' => $this->status
        ];
    }
}
