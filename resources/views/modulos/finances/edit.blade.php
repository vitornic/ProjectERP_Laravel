@extends('home')
<script>
    function k(i) {
	var v = i.value.replace(/\D/g,'');
	v = (v/100).toFixed(2) + '';
	v = v.replace(",", ".");
	v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1$2$3.");
	v = v.replace(/(\d)(\d{3}),/g, "$1.$2.");
	i.value = v;
}
</script>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Lançamento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('finances.index') }}"> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
</div>
    <div class="uk-alert-danger" uk-alert style="position: fixed; top: 0%; left: 18%; z-index: 1; width: 1000px">
        <a class="uk-alert-close" uk-close></a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('finances.update',$finance->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="fix">
        <div class="col-md-800">
            <div class="card">
                <div class="card-header">{{ __('Contas a Receber') }}<button type="submit" class="btn btn-success pull-right">{{ __('Editar') }}</button></div>

                <div class="card-body card" style="width: 38drem;">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="codLancamento">Cód. Lançamento</label>
                        <input type="text" class="form-control" id="codLancamento" name="codLancamento" value="{{ $finance->id }}" placeholder="" readonly>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="fatura">{{ __('Número da Fatura') }}</label>
                        <input type="number" class="form-control" id="fatura" name="fatura" value="{{ $finance->fatura }}" autocomplete="fatura" readonly>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="valor">{{ __('Valor do Lançamento') }}</label>
                        <input type="tel" class="form-control" onkeyup="k(this)" maxlength="13" maxlength="13" placeholder="Valores sem vírgulas ou pontos" id="valor" name="valor" value="{{ $finance->valor }}" autocomplete="valor" autofocus>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="cliente">{{ __('Nome do Cliente') }}</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $finance->cliente }}" autocomplete="cliente" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="codCliente">{{ __('Cód. Cliente') }}</label>
                            <input type="text" class="form-control" id="codCliente" name="codCliente" value="{{ $finance->codCliente }}" autocomplete="codCliente" autofocus>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cdreceita">{{ __('Conta da Receita') }}</label>
                            <input type="text" class="form-control" id="cdreceita" name="cdreceita" value="{{ $finance->cdreceita }}" autocomplete="cdreceita" autofocus>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="descricao">{{ __('Descrição do Lançamento') }}</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $finance->descricao }}" autocomplete="descricao" autofocus>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="datacompetencia">{{ __('Data de Competência') }}</label>
                            <input type="date" max="2100-12-31" min="1970-12-31" class="form-control" id="datacompetencia" name="datacompetencia" value="{{ $finance->datacompetencia }}" autocomplete="datacompetencia" autofocus>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="operacao">{{ __('Operação') }}</label>
                        <input type="text" class="form-control" id="operacao" name="operacao" value="{{ $finance->operacao }}" autocomplete="operacao" autofocus>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


