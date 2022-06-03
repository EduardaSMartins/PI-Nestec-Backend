<?php

namespace Modules\Produto\Http\Traits;

use Modules\Cliente\Entities\Cliente;
use Modules\Empresa\Http\Traits\EmpresaTrait;
use Modules\Produto\Entities\Categoria;
use Modules\Produto\Entities\Produto;
use Modules\Telefone\Http\Traits\TelefoneTrait;

trait ProdutoTrait
{

    public function saveProduto($dados)
    {
        $produto = Produto::create($dados);
        return $produto;
    }

    public function updateProduto($dados, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($dados);
        return $produto;
    }
}
