@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>EDIT</h2>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" href="sistema">Geral</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Plano de Contas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Contas Caixa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Operações</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">usuários</a>
        </li>
    </ul>

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
    </div>
    @endif

    <form action="{{ route('sistema.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="fix">
            <div class="col-md-800">
                <div class="card">
                    <div class="card-header">{{ __('Dados da Empresa') }}<button type="submit" class="btn btn-success pull-right">{{ __('Salvar') }}</button></div>

                    <div class="card-body card" style="width: 38drem;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="CNPJ">{{ __('CNPJ') }}</label>
                                <input type="text" maxlength="14" class="form-control" id="CNPJ" name="CNPJ" value="{{ $CNPJ }}" autocomplete="CNPJ" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="razaosocial">{{ __('Razão Social') }}</label>
                                <input type="text" class="form-control" id="razaosocial" name="razaosocial" value="{{ old('razaosocial') }}" autocomplete="razaosocial" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fantasia">{{ __('Nome Fantasia') }}</label>
                                <input type="text" class="form-control" id="fantasia" name="fantasia" value="{{ old('fantasia') }}" autocomplete="fantasia" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="telefone">{{ __('Telefone Comercial') }}</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" autocomplete="telefone" autofocus>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">{{ __('Celular Comercial') }}</label>
                                <input type="tel" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" autocomplete="celular" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">{{ __('Email Comercial') }}</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="CEP">{{ __('CEP') }}</label>
                                <input type="text" class="form-control" id="CEP" name="CEP" value="{{ old('CEP') }}" autocomplete="CEP" autofocus>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="UF">{{ __('UF') }}</label>
                                <input type="text" class="form-control" id="UF" name="UF" value="{{ old('UF') }}" autocomplete="UF" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cidade">{{ __('Cidade') }}</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" autocomplete="cidade" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-11">
                                <label for="endereco">{{ __('Endereço') }}</label>
                                <input type="text"class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" autocomplete="endereco" autofocus>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="numero">{{ __('Número') }}</label>
                                <input type="number" size="4" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" autocomplete="numero" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="complemento">{{ __('Complemento') }}</label>
                                <input type="text"class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}" autocomplete="complemento" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bairro">{{ __('Bairro') }}</label>
                                <input type="text" size="6" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}" autocomplete="bairro" autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inscricaoestadual">{{ __('Inscrição Estadual') }}</label>
                                <input type="text"class="form-control" id="inscricaoestadual" name="inscricaoestadual" value="{{ old('inscricaoestadual') }}" autocomplete="inscricaoestadual" autofocus>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="CNAE">{{ __('CNAE Principal') }}</label>
                                <input type="number" size="3" class="form-control" id="CNAE" name="CNAE" value="{{ old('CNAE') }}" autocomplete="CNAE" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
