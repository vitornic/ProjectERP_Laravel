@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vendas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vendas.create') }}"> Novo</a>
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
          <a class="nav-link active" href="{{ route('vendas.index') }}">Vendas</a>
        </li>
    </ul>

    <div class="tabela">
    <table class="table table-bordered">
        <tr>
            <th>Código</th>
            <th width="auto">Cliente</th>
            <th width="auto">Fatura</th>
            <th width="auto">Data</th>
            <th>Total</th>
            <th width="200px">Ação</th>
        </tr>
        @foreach ($vendas ?? '' as $venda)
        <tr>
            <td>{{ $venda->id }}</td>
            <td>{{ $venda->cliente }}</td>
            <td>{{ $venda->fatura }}</td>
            <td>{{ date("d/m/Y", strtotime($venda->datacompetencia)) }}</td>
            <td>R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
            <td>
                <form action="{{ route('vendas.destroy',$venda->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('vendas.edit',$venda->id) }}">Visualizar</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $vendas->links() !!}
    </div>

@endsection
