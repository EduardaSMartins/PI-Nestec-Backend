<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Cliente\Entities\Cliente;
use Modules\Cliente\Transformers\ClienteResource;
use Modules\Empresa\Entities\Empresa;

class CadastroResource extends JsonResource
{

    public function toArray($request)
    {
        $cliente = Cliente::findOrFail($this->id_cliente);
        $empresa = Empresa::findOrFail($this->id_empresa);

        return [
            'id' => $this->id,
            'cliente'=> new ClienteResource($cliente),
            'empresa' => new EmpresaResource($empresa),
            'status' => $this->status
        ];
    }
}
