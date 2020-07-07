@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Checar Finanças</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cadastros.create') }}"> Novo</a>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="uk-alert-success" uk-alert style="text-align: center; position: fixed; top: 0%; left: 18%; z-index: 1; width: 1000px">
            <a class="uk-alert-close" uk-close></a>
            <strong> {{ session('message') }} </strong>
        </div>
    @endif

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('cadastros.index') }}">Clientes/Fornecedores</a>
        </li>
    </ul>

    <div class="tabela">
        <table class="table table-bordered">
            <tr>
                <th>Código</th>
                <th width="auto">Nome</th>
                <th width="auto">CNPJ/CPF</th>
                <th width="auto">Cidade</th>
                <th width="auto">Telefone</th>
                <th width="200px">Ação</th>
            </tr>
            @foreach ($cadastros ?? '' as $cadastro)
            <tr>
                <td>{{ $cadastro->id }}</td>
                <td>{{ $cadastro->cliente }}</td>
                <td>{{ $cadastro->fatura }}</td>
                <td>{{ date("d/m/Y", strtotime($cadastro->datacompetencia)) }}</td>
                <td>{{ $cadastro->operacao }}</td>
                <td>
                    <form action="{{ route('cadastros.destroy',$cadastro->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('cadastros.edit',$cadastro->id) }}">Visualizar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    {!! $cadastros->links() !!}
    </div>

@endsection
