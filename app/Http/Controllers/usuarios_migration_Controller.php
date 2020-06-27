<?php

namespace App\Http\Controllers;

use App\usuarios_migration;
use Illuminate\Http\Request;

class usuarios_migration_Controller extends Controller
{
    public function index()
    {
        $usuarios = usuarios_migration::orderBy('created_at', 'desc')->paginate(10);
        return view('usuarios.index',['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $usuario = new usuarios_migration;
        $usuario->codempresa   = $request->codempresa;
        $usuario->abreviacao   = $request->abreviacao;
        $usuario->email        = $request->email;
        $usuario->senha        = $request->senha;
        $usuario->nivel_acesso = $request->nivel_acesso;
        $usuario->save();
        return redirect()->route('/')->with('message', 'Usuário criado com êxito!');
    }

    public function show($codusuario)
    {
        //
    }

    public function edit($codusuario)
    {
        $usuario = usuarios_migration::findOrFail($codusuario);
        return view('usuarios.edit',compact('usuario'));
    }

    public function update(Request $request, $codusuario)
    {
        $usuario = usuarios_migration::findOrFail($codusuario);
        $usuario->name        = $request->name;
        $usuario->description = $request->description;
        $usuario->quantity    = $request->quantity;
        $usuario->price       = $request->price;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('message', 'Usuário atualizado com êxito!');
    }

    public function destroy($codusuario)
    {
        $usuario = usuarios_migration::findOrFail($codusuario);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('alert-success','Usuário foi deletado!');
    }
}
