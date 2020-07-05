<style>
    /* Style the sidebar - fixed full height */
.sidebar {
  /*height: 100vh;*/
  width: 200px;
  position: relative;
  float: left;
  /*display: block;*/
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  overflow: none;
  padding-top: 16px;
  margin-bottom: -101vh;
  padding-bottom: 101vh;
}

.active {
    color: white;
    background-color: rgba(240, 248, 255, 0.233);
}

/* Style sidebar links */
.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

/* Style links on mouse-over */
.sidebar a:hover {
  color: #f1f1f1;
  text-decoration: none;
}

/* Style the main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  padding: 0px 10px;
  min-height: 100%;
}

/* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.fix {
    float: left;
    position: relative;
    width: 83.7vh;
    padding: 10px;
}

.tabela {
    float: left;
    position: relative;
    width: auto;
    padding: 14px;
    max-width: 83.7vh;
}

</style>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-pjax-version" content="{{ mix('css/app.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @guest
    @else
        <div>
            <div class="sidebar">

                <a class="navbar-brand" href="#">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    &nbsp MODULOS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="{{ route('finances.index') }}" class="{{ Request::is('finances') ? 'active' : '' }}"><i class="fa fa-fw fa-money"></i> {{ __('Financeiro') }}</a>
                <a href="{{ route('vendas.index') }}" class="{{ Request::is('vendas') ? 'active' : '' }}"><i class="fa fa-fw fa-cart-arrow-down"></i> {{ __('Vendas') }}</a>
                <a href="{{ route('compras.index') }}" class="{{ Request::is('compras') ? 'active' : '' }}"><i class="fa fa-fw fa-cart-plus"></i> {{ __('Compras') }}</a>
                <a href="{{ route('cadastros.index') }}" class="{{ Request::is('cadastros') ? 'active' : '' }}"><i class="fa fa-fw fa-user-plus"></i> {{ __('Cadastro') }}</a>
                <a href="{{ route('produtos.index') }}" class="{{ Request::is('produtos') ? 'active' : '' }}"><i class="fa fa-fw fa-dropbox"></i> {{ __('Produtos') }}</a>
                <a href="{{ route('estoque.index') }}" class="{{ Request::is('estoque') ? 'active' : '' }}"><i class="fa fa-fw fa-pie-chart"></i> {{ __('Estoque') }}</a>
                <a href="{{ route('relatorios.index') }}" class="{{ Request::is('relatorios') ? 'active' : '' }}"><i class="fa fa-fw fa-line-chart"></i> {{ __('Relatórios') }}</a>
                <a href="{{ route('sistema.index') }}" class="{{ Request::is('sistema') ? 'active' : '' }}"><i class="fa fa-fw fa-cog"></i> {{ __('Sistema') }}</a>
            </div>
        </div>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">

            <div class="container">

                <a href="{{ url('/') }}"><img src="{{ ('../../imgs/logo.png') }}" alt="logo" style="" border="0" height="35px" width="130px"></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
