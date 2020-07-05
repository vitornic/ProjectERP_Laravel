<?php

namespace App\Http\Controllers;

use App\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::latest()->paginate(4);
        //return view('modulos.finances.index');
        return view('modulos.finances.index',compact('finances'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$codLancamento = Finance::query('SELECT * FROM finances WHERE max(`id`)')->get();
        return view('modulos.finances.create');

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
            'cliente' => 'required|string|regex:/^[\p{L}\s-]+$/|max:255',
            'fatura' => 'required|unique:finances',
            'valor' => 'required|numeric',
            'codCliente' => 'required|numeric',
            'descricao' => 'required|alpha',
            'cdreceita' => 'required|numeric',
            'operacao' => 'required|numeric',
            'datacompetencia' => 'required'
        ]);

        Finance::create($request->all());

        return redirect()->route('finances.index')
                        ->with('success','Lançado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        return view('modulos.finances.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        return view('modulos.finances.edit',compact('finance'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        $request->validate([
            'cliente' => 'required|string|regex:/^[\p{L}\s-]+$/|max:255',
            'fatura' => 'required',
            'valor' => 'required|numeric',
            'codCliente' => 'required|numeric',
            'descricao' => 'required|alpha',
            'cdreceita' => 'required|numeric',
            'operacao' => 'required|numeric',
            'datacompetencia' => 'required|date_format:Y-m-d'
        ]);

        $finance->update($request->all());

        return redirect()->route('finances.index')
                        ->with('message','Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();

        return redirect()->route('finances.index')->with('message','Lançamento excluído com sucesso.')->withErrors('message','erro ao exlcuir');
    }
}
