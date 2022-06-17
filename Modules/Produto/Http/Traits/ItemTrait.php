<?php

namespace Modules\Produto\Http\Traits;

use Modules\Produto\Entities\Item;

trait ItemTrait
{

    public function saveItem($dados)
    {
        $dados['valor_total'] = $dados['quantidade'] * $dados['valor'];
        $item = Item::create($dados);
        return $item;
    }
}
