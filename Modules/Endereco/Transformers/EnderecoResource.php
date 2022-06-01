<?php

namespace Modules\Endereco\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class EnderecoResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'endereco' => [
                'end_complemento' => $this->end_complemento,
                'end_numero' => $this->end_numero,
                'end_tipo' => $this->end_tipo,
                'status' => $this->status
            ],
            'logradouro' => [
                'log_descricao' => $this->log_descricao,
                'log_cep' => $this->log_cep
            ],
            'bairro' => [
                'bai_nome' => $this->bairro->bai_nome
            ],
            'municipio' => [
                'mun_nome' => $this->bairro->municipio->mun_nome,
                'mun_uf' => $this->bairro->municipio->mun_uf,
                'mun_cod_ibge' => $this->bairro->municipio->mun_cod_ibge,
            ]
        ];
    }
}
