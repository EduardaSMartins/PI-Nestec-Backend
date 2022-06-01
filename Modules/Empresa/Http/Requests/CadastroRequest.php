<?php

namespace Modules\Empresa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
{

    public function rules()
    {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
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

            'cadastro.cliente.telefone' => 'present',
            'cadastro.cliente.telefone.numero' => 'sometimes',
            'cadastro.cliente.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.cliente.telefone.observacao' => 'sometimes',

            'cadastro.empresa' => 'present',
            'cadastro.empresa.cnpj' => 'sometimes',
            'cadastro.empresa.razao_social' => 'sometimes',
            'cadastro.empresa.nome_fantasia' => 'sometimes',
            'cadastro.empresa.ramo_atividade' => 'sometimes',
            'cadastro.empresa.email' => 'sometimes',
            'cadastro.empresa.porte' => ['sometimes', 'in:micro,pequena,media,grande'],

            'cadastro.empresa.telefone' => 'present',
            'cadastro.empresa.telefone.nome' => 'sometimes',
            'cadastro.empresa.telefone.tipo' => ['sometimes', 'in:celular,fixo'],
            'cadastro.empresa.telefone.observacao' => 'sometimes',

            'cadastro.empresa.endereco.' => 'present',
            'cadastro.empresa.endereco.endereco' => 'present',
            'cadastro.empresa.endereco.endereco.complemento' => 'sometimes',
            'cadastro.empresa.endereco.endereco.numero' => 'sometimes',

            'cadastro.empresa.endereco.logradouro' => 'sometimes',
            'cadastro.empresa.endereco.logradouro.descricao' => 'sometimes',
            'cadastro.empresa.endereco.logradouro.cep' => 'sometimes',

            'cadastro.empresa.endereco.bairro' => 'present',
            'cadastro.empresa.endereco.bairro.nome' => 'sometimes',

            'cadastro.empresa.endereco.municipio' => 'present',
            'cadastro.empresa.endereco.municipio.mun_nome' => 'sometimes',
            'cadastro.empresa.endereco.municipio.mun_uf' => 'sometimes',
            'cadastro.empresa.endereco.municipio.mun_cod_ibge' => 'sometimes',
        ];
    }

    /** Message to any type of attribute **/
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'present' => 'O campo :attibute deve estar presente'
        ];
    }

    /** Determine if the user is authorized to make this request. **/
    public function authorize()
    {
        return true;
    }
}
