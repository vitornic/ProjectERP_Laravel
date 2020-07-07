<?php

namespace App\Http\Controllers;

use App\Operacoes;
use Illuminate\Http\Request;

class OperacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $operacoes = Operacoes::latest()->paginate(10);

        return view('modulos.sistema.operacoes.index',compact('operacoes'))->with('i', (request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigo = Operacoes::max('id')+1;
        return view('modulos.sistema.operacoes.create', compact('codigo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'movimento' => 'required'
        ]);

        Operacoes::create($request->all());

        return redirect()->route('operacoes.index')
                        ->with('success','Gravado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operacoes  $operacoes
     * @return \Illuminate\Http\Response
     */
    public function show(Operacoes $operacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operacoes  $operacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Operacoes $operacoes)
    {
        return view('modulos.sistema.operacoes.edit',compact('operacoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operacoes  $operacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacoes $operacoes)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'movimento' => 'required'
        ]);

        $operacoes->update($request->all());

        return redirect()->route('operacoes.index')
                        ->with('success','Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operacoes  $operacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operacoes $operacoes)
    {
        $operacoes->delete();

        return redirect()->route('operacoes.index')->with('message','Lançamento excluído com sucesso.')->withErrors('message','erro ao excluir');
    }
}
