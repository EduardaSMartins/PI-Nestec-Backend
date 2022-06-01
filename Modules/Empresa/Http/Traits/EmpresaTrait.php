<?php

namespace Modules\Empresa\Http\Traits;

use Modules\Empresa\Entities\Empresa;
use Modules\Endereco\Http\Controllers\Traits\MunicipioTrait;
use Modules\Telefone\Http\Controllers\Traits\TelefoneTrait;

trait EmpresaTrait
{

    //Cria nova empresa
    public function saveUpdateEmpresa($dados, $id = null)
    {
        $dados_telefone = $dados['telefone'];
        $dados_endereco = $dados['endereco'];

        if(is_null($id)){
            $empresa = Empresa::create($dados);
        }else{
            $empresa = Empresa::findOrFail($id);
            $empresa->telefone()->delete();  
        }

        $telefone = $this->saveUpdateTelefone($dados_telefone);
        $dados['id_telefone'] = $telefone->id;

        //Criar e atribuir endereço à empresa
        $endereco = $this->createEndereco($dados, $empresa);
        $empresa->endereco()->attach($endereco);

        $empresa->update($dados);
        return $empresa;
    }

    public function createEndereco($dados, $pessoa)
    {
        $ends = [];
        foreach ($dados as $e) {
            $dados_endereco = $e['endereco'];
            $dados_logradouro = $e['logradouro'];
            $dados_bairro = $e['bairro'];
            $dados_municipio = $e['municipio'];

            dd('EmpresaTrait - createEndereco', $dados_endereco);

            $municipio = $this->saveUpdateMunicipio($dados_municipio);
            $dados_bairro['id_municipio'] = $municipio->id;
            $bairro = $this->saveUpdateBairro($dados_bairro);
            $dados_logradouro['id_bairro'] = $bairro->id;
            $logradouro = $this->saveUpdateLogradouro($dados_logradouro);
            $ends[$logradouro->id] = ['complemento' => $dados_endereco['complemento'], 'numero' => $dados_endereco['numero']];
        }
        return $ends;
    }
}
