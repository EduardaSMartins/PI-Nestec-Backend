<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Cliente\Transformers\ClienteResource;
use Modules\Endereco\Transformers\EnderecoResource;
use Modules\Telefone\Transformers\TelefoneResource;

class EmpresaResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'cnpj' => $this ,
            'razao_social' => $this ,
            'nome_fantasia' => $this ,
            'ramo_atividade' => $this ,
            'email' => $this ,
            'porte' => $this ,
            'telefone' => new TelefoneResource($this->telefone),
            'endereco' => new EnderecoResource($this->endereco)
        ];
    }
}
