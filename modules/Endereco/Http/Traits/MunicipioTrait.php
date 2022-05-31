<?php

namespace Modules\Endereco\Http\Controllers\Traits;

use Modules\Empresa\Entities\Empresa;
use Modules\Endereco\Entities\Municipio;
use Modules\Endereco\Http\Controllers\Traits\EnderecoTrait;
use Modules\Telefone\Http\Controllers\Traits\TelefoneTrait;

trait MunicipioTrait
{
    //Cria novo município ou atualiza o existente
    public function saveUpdateMunicipio($dados, $id = null)
    {
        if (is_null($id)) {
            $municipio = Municipio::where('cod_ibge', $dados['cod_ibge'])->first();
            if (blank($municipio))
                $municipio = Municipio::create($dados);
            else
                $municipio->update($dados);
        } else {
            $municipio = Municipio::findOrFail($id);
            $municipio->update($dados);
        }
        return $municipio;
    }
}
