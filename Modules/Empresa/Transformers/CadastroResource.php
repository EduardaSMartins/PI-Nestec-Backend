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
        $cliente = Cliente::findOrFail($this->id);
        $empresa = Empresa::where('id_cliente',$cliente->id)->first();

        return [
            // 'id' => $this->id,
            'cliente'=> new ClienteResource($cliente),
            'empresa' => new EmpresaResource($empresa),
            // 'status' => $this->status
        ];
    }
}
