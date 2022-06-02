<?php

namespace Modules\Cliente\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Telefone\Entities\Telefone;
use Modules\Telefone\Transformers\TelefoneResource;

class ClienteResource extends JsonResource
{

    public function toArray($request)
    {
        $telefone = Telefone::findOrFail($this->id_telefone);

        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'rg_orgao' => $this->rg_orgao,
            'rg_uf' => $this->rg_uf,
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'data_nascimento' => $this->data_nascimento,
            'telefone' => new TelefoneResource($telefone)
        ];
    }
}
