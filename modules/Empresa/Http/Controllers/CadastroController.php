<?php

namespace Modules\Empresa\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Empresa\Http\Requests\CadastroRequest;
use Modules\Empresa\Http\Traits\CadastroTrait;
use Modules\Empresa\Transformers\CadastroResource;

class CadastroController extends Controller
{
    use CadastroTrait;


    public function index()
    {
        $odio = ['rota', 'te', 'odeio'];
        return response()->json($odio, 200);
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

        $cadastro = $this->saveCadastro($dados_cadastro);

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
        // $cadastro = 
        return view('empresa::show');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CadastroRequest $request, $id)
    {
        $dados_cadastro = $request->input('cadastro');
        DB::beginTransaction();

        $cadastro = $this->saveCadastro($dados_cadastro, $id);

        DB::commit();
        return response()->json(new CadastroResource($cadastro), 200);
    }
}
