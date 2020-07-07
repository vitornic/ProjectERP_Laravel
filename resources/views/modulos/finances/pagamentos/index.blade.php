@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Checar Finanças</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pagamentos.create') }}"> Novo</a>
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
          <a class="nav-link" href="{{ route('finances.index') }}">Recebimentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('pagamentos.index') }}">Pagamentos</a>
        </li>
    </ul>

    <div class="tabela">
    <table class="table table-bordered">
        <tr>
            <th>Código</th>
            <th width="auto">Fornecedor</th>
            <th width="auto">Nota Fiscal</th>
            <th width="auto">Data</th>
            <th width="auto">Situação</th>
            <th>Valor</th>
            <th width="200px">Ação</th>
        </tr>
        @foreach ($pagamento ?? '' as $pagament)
        <tr>
            <td>{{ $pagament->id }}</td>
            <td>{{ $pagament->fornecedor }}</td>
            <td>{{ $pagament->notafiscal }}</td>
            <td>{{ date("d/m/Y", strtotime($pagament->datacompetencia)) }}</td>
            <td>{{ $pagament->operacao }}</td>
            <td>R$ {{ number_format($pagament->valor, 2, ',', '.') }}</td>
            <td>
                <form action="{{ route('pagamentos.destroy',$pagament->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('pagamentos.edit',$pagament->id) }}">Visualizar</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $pagamento->links() !!}
    </div>

@endsection
