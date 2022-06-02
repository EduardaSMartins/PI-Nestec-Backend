<?php

namespace Modules\Empresa\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Cliente\Transformers\ClienteResource;
use Modules\Empresa\Entities\Empresa;
use Modules\Endereco\Transformers\EnderecoResource;
use Modules\Telefone\Entities\Telefone;
use Modules\Telefone\Transformers\TelefoneResource;

class EmpresaResource extends JsonResource
{

    public function toArray($request)
    {
        $telefone = Telefone::findOrFail($this->id_telefone);

        return [
            'id' => $this->id,
            'cnpj' => $this->cnpj,
            'razao_social' => $this->razao_social,
            'nome_fantasia' => $this->nome_fantasia,
            'ramo_atividade' => $this->ramo_atividade,
            'email' => $this->email,
            'porte' => $this->porte,
            'telefone' => new TelefoneResource($telefone),
            'endereco' => EnderecoResource::collection($this->enderecos)
        ];
    }
}
