@extends('home')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Operação</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('operacoes.index') }}"> Voltar</a>
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

<form action="{{ route('operacoes.store') }}" method="POST">
    @csrf
<div class="fix">
    <div class="col-md-800">
        <div class="card">
            <div class="card-header">{{ __('Operações') }}<button type="submit" class="btn btn-success pull-right">{{ __('Salvar') }}</button></div>

            <div class="card-body card" style="width: 38drem;">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="codLancamento">Código Interno</label>
                        <input type="text" class="form-control" id="codLancamento" name="codLancamento" value="{{ $codigo }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="descricao">{{ __('Descrição') }}</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}" autocomplete="descricao" autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="movimento">{{ __('Movimento') }}</label>
                        <select class="form-control" name="movimento" id="movimento">
                            <option class="form-control" value="1">Aumenta o Saldo</option>
                            <option class="form-control" value="2">Diminui o Saldo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection


