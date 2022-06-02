<?php

namespace Modules\Cliente\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cliente\Http\Traits\ClienteTrait;
use Modules\Cliente\Http\Requests\CadastroRequest;
use Modules\Empresa\Transformers\CadastroResource;

class ClienteController extends Controller
{
    use ClienteTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Verificar se deseja listar os clientes com cadastro aprovado ou pendentes
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CadastroRequest $request)
    {
        dd('oi');
        $dados_cadastro = $request->input('cadastro');
        DB::beginTransaction();

        $cadastro = $this->saveUpdateCliente($dados_cadastro);

        DB::commit();
        return response()->json($cadastro, 200);
        // return response()->json(new CadastroResource($cadastro), 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cadastro = DB::table('cadastros')
            ->where('id', $id)
            ->first();

        return response()->json(new CadastroResource($cadastro), 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CadastroRequest $request, $id)
    {
        dd('ClienteController - update');
        $dados_cadastro = $request->input('cadastro');
        DB::beginTransaction();

        $cadastro = $this->saveUpdateCliente($dados_cadastro, $id);
        DB::commit();
        return response()->json(new CadastroResource($cadastro), 200);
    }
}
