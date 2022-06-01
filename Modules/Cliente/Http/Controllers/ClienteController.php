<?php

namespace Modules\Cliente\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cliente\Entities\Cliente;
use Modules\Cliente\Http\Traits\ClienteTrait;
use Modules\Empresa\Http\Requests\CadastroRequest;
use Modules\Empresa\Transformers\CadastroResource;

class ClienteController extends Controller
{
    // use ClienteTrait;
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Verificar se deseja listar os clientes com cadastro aprovado ou pendentes
        $clientes = Cliente::with('empresa', 'cadastros')->get();
        return response()->json(CadastroResource::collection($clientes),200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CadastroRequest $request)
    {
        dd('ClienteController - store');
        $dados_cadastro = $request->input('cadastros');
        DB::beginTransaction();

        $cadastro = $this->saveUpdateCliente($dados_cadastro);
        DB::commit();
        return response()->json(new CadastroResource($cadastro), 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cliente = Cliente::with('empresa','cadastros');
        return response()->json(new CadastroResource($cliente),200);
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
