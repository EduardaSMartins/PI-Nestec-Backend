<?php

namespace Modules\Empresa\Http\Controllers\Traits;

use Modules\Endereco\Entities\Bairro;
use Modules\Endereco\Http\Controllers\Traits\EnderecoEmpresaTrait;

trait BairroTrait
{
    use EnderecoEmpresaTrait;

    //Cria ou atualiza o bairro pertencente ao município
    public function saveUpdateBairro($dados, $id = null)
    {

        if(is_null($id)){
            // Verifica se o bairro já existe naquela cidade
            $bairro = Bairro::where('nome', $dados['nome'])->where('id_municipio', $dados['id_municipio'])->first();
            if(blank($bairro))
                $bairro = Bairro::create($dados);
            else
                $bairro->update($dados);
        }else{
            $bairro = Bairro::findOrFail($id);
            $bairro->update($dados);
        }
        return $bairro;
    }
}