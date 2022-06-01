<?php

namespace Modules\Empresa\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Cliente\Entities\Cliente;
use Modules\Endereco\Entities\Logradouro;
use Modules\Telefone\Entities\Telefone;

class Empresa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_cliente',
        'id_telefone',
        'cnpj',
        'razao_social',
        'nome_fantasia',
        'ramo_atividade',
        'email',
        'porte'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    protected function cadastros()
    {
        return $this->belongsToMany(Cliente::class, 'cadastros', 'id_cliente', 'id_empresa')
            ->whereNull('cadastros.deleted_at')
            ->withTimestamps()
            ->withPivot('status');
    }

    protected function telefone()
    {
        return $this->hasOne(Telefone::class);
    }

    protected function endereco()
    {
        return $this->belongsToMany(Logradouro::class, 'endereco_empresas', 'id_empresa', 'id_logradouro')
            ->whereNull('enredereco_empresas.deleted_at')
            ->withTimeStamps()
            ->withPivot('complemento','numero');
    }
}
