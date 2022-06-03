<?php

namespace Modules\Cliente\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cadastro' => 'required',
            'cadastro.cliente' => 'required',
            'cadastro.cliente.cpf' => 'required',
            'cadastro.cliente.rg' => 'sometimes',
            'cadastro.cliente.rg_orgao' => 'sometimes',
            'cadastro.cliente.rg_uf' => 'sometimes',
            'cadastro.cliente.nome' => 'required',
            'cadastro.cliente.sobrenome' => 'required',
            'cadastro.cliente.email' => 'sometimes',
            'cadastro.cliente.data_nascimento' => 'sometimes',
            
            'cadastro.cliente.telefone' => 'present',
            'cadastro.cliente.telefone.numero' => 'required',
            'cadastro.cliente.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.cliente.telefone.observacao' => 'sometimes',

            'cadastro.empresa' => 'present',
            'cadastro.empresa.cnpj' => 'required',
            'cadastro.empresa.razao_social' => 'required',
            'cadastro.empresa.nome_fantasia' => 'sometimes',
            'cadastro.empresa.ramo_atividade' => 'required',
            'cadastro.empresa.email' => 'sometimes',
            'cadastro.empresa.porte' => ['sometimes', 'in:micro,pequena,media,grande'],
            
            'cadastro.empresa.telefone' => 'present',
            'cadastro.empresa.telefone.numero' => 'required',
            'cadastro.empresa.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.empresa.telefone.observacao' => 'sometimes',

            'cadastro.empresa.enderecos' => 'present',
            'cadastro.empresa.enderecos.*.endereco' => 'present',
            'cadastro.empresa.enderecos.*.endereco.complemento' => 'sometimes',
            'cadastro.empresa.enderecos.*.endereco.numero' => 'sometimes',
            
            'cadastro.empresa.enderecos.*.logradouro' => 'present',
            'cadastro.empresa.enderecos.*.logradouro.descricao' => 'sometimes',
            'cadastro.empresa.enderecos.*.logradouro.cep' => 'required',
            
            'cadastro.empresa.enderecos.*.bairro' => 'present',
            'cadastro.empresa.enderecos.*.bairro.nome' => 'required',
            
            'cadastro.empresa.enderecos.*.municipio' => 'present',
            'cadastro.empresa.enderecos.*.municipio.nome' => 'required',
            'cadastro.empresa.enderecos.*.municipio.uf' => 'required',
            'cadastro.empresa.enderecos.*.municipio.cod_ibge' => 'sometimes'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
 