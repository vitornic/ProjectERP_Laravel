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
        $finances = Finance::latest()->paginate(15);
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
            'cliente' => 'required',
            'fatura' => 'required',
            'valor' => 'required',
            'codCliente' => 'required',
            'descricao' => 'required',
            'cdreceita' => 'required',
            'operacao' => 'required',
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
