<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ URL::asset('publico/layout/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('publico/layout/style.css') }}">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    @stack('table_css')
    @stack('css')
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <div>
                        <img src="{{ URL::asset('publico/img/icon.png') }}"
                            style="width:50%;margin-top:10px;margin-bottom:5px">
                    </div>
                    <div class="sidebar-logo">
                        <p style="color: rgb(0, 0, 0);font-size:10px;font-weight:900;margin:0px;background:white">
                            {{ Auth::user()->name }}
                            <br>
                            <label style="color: red">
                                {{ Auth::user()->admin == null ? 'USUARIO' : 'ADMIN' }}
                            </label>
                            <br>
                            {{ Auth::user()->fazenda->name }}
                        </p>
                        <div class="sidebar-item" style="background: red">
                            <a href="{{ route('logout') }}" class="sidebar-link">
                                <i class="lni lni-exit sair"></i>
                                <span>Sair</span>
                            </a>
                        </div>
                    </div>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('lotes.index') }}" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Lotes</span>
                    </a>
                </li>
                {{-- drop --}}
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-layout"></i>
                        <span>Configurações</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse text-center"
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('usuario.index') }}" class="sidebar-link">Usuarios</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('fazenda.index') }}" class="sidebar-link">Fazendas</a>
                        </li>
                    </ul>
                </li>
                {{-- fim drop --}}
            </ul>
        </aside>
        <div class="main">
            <x-alerts.validator />
            <nav style="background: var(--nav);height:50px;">
                {{-- nav --}}
                @yield('nav')
            </nav>
            <div style="margin: 20px">
                {{-- slot --}}
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('publico/script/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('publico/layout/script/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('publico/layout/script.js') }}"></script>
    <x-upper.text-upper />
    @include('sweetalert::alert')
    @stack('table_script')
    @stack('script')

</body>

</html>
