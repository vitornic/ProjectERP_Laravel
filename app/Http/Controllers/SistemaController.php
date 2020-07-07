<?php

namespace App\Http\Controllers;

use App\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cnpj = Sistema::select('CNPJ');
        return view('modulos.sistema.index');

        // if (isset($cnpj)) {
        //     return view('modulos.sistema.edit');
        // } else {
        //     return view('modulos.sistema.index');
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'CNPJ' => 'required|unique:sistemas|max:14',
            'razaosocial' => 'required|max:255',
            'fantasia' => 'required|max:255',
            'telefone' => 'required|max:13',
            'celular' => 'required|max:14',
            'email' => 'required|max:255',
            'CEP' => 'required|max:8',
            'UF' => 'required|max:2',
            'cidade' => 'required|max:255',
            'endereco' => 'required|max:255',
            'numero' => 'required',
            'complemento' => 'required|max:255',
            'bairro' => 'required|max:255',
            'inscricaoestadual' => 'required|max:12',
            'CNAE' => 'required|max:255'
        ]);

        Sistema::create($request->all());

        return redirect()->route('sistema.index')
                        ->with('success','Criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function show(Sistema $sistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function edit(Sistema $sistema)
    {
        $sistemas = Sistema::latest('id');
        return view('modulos.sistema.edit',compact('sistema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sistema $sistema)
    {
        $request->validate([
            'CNPJ' => 'required|unique:sistemas|max:14',
            'razaosocial' => 'required|max:255',
            'fantasia' => 'required|max:255',
            'telefone' => 'required|max:13',
            'celular' => 'required|max:14',
            'email' => 'required|max:255',
            'CEP' => 'required|max:8',
            'UF' => 'required|max:2',
            'cidade' => 'required|max:255',
            'endereco' => 'required|max:255',
            'numero' => 'required',
            'complemento' => 'required|max:255',
            'bairro' => 'required|max:255',
            'inscricaoestadual' => 'required|max:12',
            'CNAE' => 'required|max:255'
        ]);

        $sistema->update($request->all());

        return redirect()->route('sistema.index')
                        ->with('success','Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sistema  $sistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
}
