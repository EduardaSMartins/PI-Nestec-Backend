<?php

namespace Modules\Cliente\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
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
            'cadastro.cliente.data_nascimento' => 'required',

            'cadastro.cliente.telefone' => 'required',
            'cadastro.cliente.telefone.numero' => 'required',
            'cadastro.cliente.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.cliente.telefone.observacao' => 'sometimes',

            'cadastro.empresa' => 'required',
            'cadastro.empresa.cnpj' => 'required',
            'cadastro.empresa.razao_social' => 'required',
            'cadastro.empresa.nome_fantasia' => 'sometimes',
            'cadastro.empresa.ramo_atividade' => 'required',
            'cadastro.empresa.email' => 'sometimes',
            'cadastro.empresa.porte' => ['sometimes', 'in:micro,pequena,media,grande'],

            'cadastro.empresa.telefone' => 'required',
            'cadastro.empresa.telefone.numero' => 'required',
            'cadastro.empresa.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.empresa.telefone.observacao' => 'sometimes',

            'cadastro.empresa.endereco' => 'present',
            'cadastro.empresa.endereco.endereco.complemento' => 'sometimes',
            'cadastro.empresa.endereco.endereco.numero' => 'sometimes',

            'cadastro.empresa.endereco.logradouro' => 'present',
            'cadastro.empresa.endereco.logradouro.descricao' => 'sometimes',
            'cadastro.empresa.endereco.logradouro.cep' => 'sometimes',

            'cadastro.empresa.endereco.bairro' => 'present',
            'cadastro.empresa.endereco.bairro.nome' => 'sometimes',

            'cadastro.empresa.endereco.municipio' => 'present',
            'cadastro.empresa.endereco.municipio.nome' => 'sometimes',
            'cadastro.empresa.endereco.municipio.uf' => 'sometimes',
            'cadastro.empresa.endereco.municipio.cod_ibge' => 'sometimes',
        ];
    }

    /** Message to any type of attribute **/
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    /** Determine if the user is authorized to make this request. **/
    public function authorize()
    {
        return true;
    }
}
