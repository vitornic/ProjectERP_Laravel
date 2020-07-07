@extends('home')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Operações</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('operacoes.create') }}"> Novo</a>
        </div>
    </div>
</div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('sistema.index') }}">Geral</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Plano de Contas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Contas Caixa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('operacoes.index') }}">Operações</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Usuários</a>
        </li>
    </ul>

    <div class="tabela">
        <table class="table table-bordered">
            <tr>
                <th>Código Interno</th>
                <th width="auto">Descrição</th>
                <th width="auto">Movimento</th>
                <th width="auto">Ação</th>
            </tr>
            @foreach ($operacoes ?? '' as $operacoe)
            <tr>
                <td>{{ $operacoe->id }}</td>
                <td>{{ $operacoe->descricao }}</td>
                <td>{{ $operacoe->movimento }}</td>
                <td>
                    <form action="{{ route('operacoes.destroy',$operacoe->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('operacoes.edit',$operacoe->id) }}">Visualizar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $operacoes->links() !!}
        </div>
@endsection
