<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Modules\Cliente\Entities\Cliente;
use Modules\Cliente\Transformers\ClienteResource;
use Modules\Empresa\Entities\Empresa;

class CadastroFindResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $cliente = Cliente::findOrFail($this->id_cliente);
        $empresa = Empresa::findOrFail($this->id_empresa);

        // $cadastro = DB::table('cadastros')
        //     ->where('id_cliente', $cliente->id)
        //     ->where('id_empresa', $empresa->id)
        //     ->first();

        return [
            'id' => $this->id,
            'cliente' => new ClienteResource($cliente),
            'empresa' => new EmpresaResource($empresa),
            'status' => $this->status
        ];
    }
}
