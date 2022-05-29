<?php

namespace Modules\Telefone\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Telefone\Database\factories\TelefoneFactory::new();
    }
}
