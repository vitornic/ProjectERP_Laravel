@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Compras</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('compras.create') }}"> Novo</a>
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
          <a class="nav-link active" href="{{ route('compras.index') }}">Compras</a>
        </li>
    </ul>

    <div class="tabela">
    <table class="table table-bordered">
        <tr>
            <th>Código</th>
            <th width="auto">Fornecedor</th>
            <th width="auto">Nota Fiscal</th>
            <th width="auto">Data</th>
            <th>Total</th>
            <th width="200px">Ação</th>
        </tr>
        @foreach ($compras ?? '' as $compra)
        <tr>
            <td>{{ $compra->id }}</td>
            <td>{{ $compra->cliente }}</td>
            <td>{{ $compra->fatura }}</td>
            <td>{{ date("d/m/Y", strtotime($compra->datacompetencia)) }}</td>
            <td>R$ {{ number_format($compra->valor, 2, ',', '.') }}</td>
            <td>
                <form action="{{ route('compras.destroy',$compra->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('compras.edit',$compra->id) }}">Visualizar</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $compras->links() !!}
    </div>

@endsection
