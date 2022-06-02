<?php

namespace Modules\Empresa\Http\Traits;

use Modules\Empresa\Entities\Empresa;
use Modules\Endereco\Http\Traits\LogradouroTrait;
use Modules\Endereco\Http\Traits\MunicipioTrait;
use Modules\Telefone\Http\Traits\TelefoneTrait;
use Modules\Endereco\Http\Traits\BairroTrait;

trait EmpresaTrait
{
    use TelefoneTrait;
    use MunicipioTrait;
    use BairroTrait;
    use LogradouroTrait;

    //Cria nova empresa
    public function saveUpdateEmpresa($dados, $id = null)
    {
        $dados_telefone = $dados['telefone'];
        $dados_endereco = $dados['endereco'];

        if (is_null($id)) {
            $empresa = Empresa::create($dados);
        } else {
            $empresa = Empresa::findOrFail($id);
            $empresa->telefone()->delete();
        }

        $telefone = $this->saveUpdateTelefone($dados_telefone);
        $dados['id_telefone'] = $telefone->id;

        //Criar e atribuir endereço à empresa
        $this->createEndereco($dados_endereco, $empresa);

        $empresa->update($dados);
        return $empresa;
    }

    public function createEndereco($dados, $empresa)
    {
        $dados_endereco = $dados['endereco'];
        $dados_logradouro = $dados['logradouro'];
        $dados_bairro = $dados['bairro'];
        $dados_municipio = $dados['municipio'];

        $enderecos = [];
        foreach($dados as $endereco){
            $municipio = $this->saveUpdateMunicipio($dados_municipio);
            $dados_bairro['id_municipio'] = $municipio->id;
            $bairro = $this->saveUpdateBairro($dados_bairro);
            $dados_logradouro['id_bairro'] = $bairro->id;
            $logradouro = $this->saveUpdateLogradouro($dados_logradouro);
            
            $enderecos[$logradouro->id] = ['complemento' => $dados_endereco['complemento'], 'numero' => $dados_endereco['numero']];
        }
        $empresa->enderecos()->attach($enderecos);
        return true;
    }
}
