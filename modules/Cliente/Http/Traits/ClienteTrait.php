<?php

namespace Modules\Empresa\Http\Controllers\Traits;

use Modules\Cliente\Entities\Cliente;
use Modules\Telefone\Http\Controllers\Traits\TelefoneTrait;

trait ClienteTrait
{
    use EmpresaTrait;
    use TelefoneTrait;

    //Cria cadastro de novo cliente
    public function saveUpdateCliente($dados, $id = null)
    {
        $dados_cliente = $dados['cliente'];
        $dados_empresa = $dados['empresa'];
        $dados_telefone = $dados['telefone'];

        $telefone = $this->saveUpdateTelefone($dados_telefone);
        $dados_cliente['id_telefone'] = $telefone->id;
        
        if(is_null($id)){
            $cliente = Cliente::create($dados_cliente);
        }else{
            $cliente = Cliente::findOrFail($id);
            $cliente->update($dados_cliente);
        }
        
        $dados_empresa['id_cliente'] = $cliente->id;
        $empresa = $this->saveUpdateEmpresa($dados_empresa);

        $cadastro = ['id_cliente' => $cliente->id, 'id_empresa' => $empresa->id, 'status' => 'pendente'];
        
        $cliente->cadastros()->attach($cadastro);
        return $cliente;
    }
}
