@extends('home')
<style>
    .fix {
        float: left;
        position: relative;
        width: 83.7%;
        padding: 10px;
    }
</style>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lançamento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('finances.index') }}"> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('finances.store') }}" method="POST">
    @csrf
<div class="fix">
    <div class="col-md-800">
        <div class="card">
            <div class="card-header">{{ __('Contas a Receber') }}<button type="submit" class="btn btn-success pull-right">{{ __('Salvar') }}</button></div>

            <div class="card-body card" style="width: 38drem;">
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="codLancamento">Cód. Lançamento</label>
                    <input type="text" required class="form-control" id="codLancamento" name="codLancamento" placeholder="" readonly>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="fatura">{{ __('Número da Fatura') }}</label>
                    <input type="text" required class="form-control" id="fatura" name="fatura">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="valor">{{ __('Valor do Lançamento') }}</label>
                    <input type="text" required class="form-control" id="valor" name="valor">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="cliente">{{ __('Nome do Cliente') }}</label>
                        <input type="text" required class="form-control" id="cliente" name="cliente">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="codCliente">{{ __('Cód. Cliente') }}</label>
                        <input type="text" required class="form-control" id="codCliente" name="codCliente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cdreceita">{{ __('Conta da Receita') }}</label>
                        <input type="text" required class="form-control" id="cdreceita" name="cdreceita">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="descricao">{{ __('Descrição do Lançamento') }}</label>
                        <input type="text" required class="form-control" id="descricao" name="descricao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="datacompetencia">{{ __('Data de Competência') }}</label>
                        <input type="date" required class="form-control" id="datacompetencia" name="datacompetencia">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="operacao">{{ __('Operação') }}</label>
                    <input type="text" required class="form-control" id="operacao" name="operacao">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection


