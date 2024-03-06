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
                            WESLLEY
                            <br>
                            <label style="color: red">USUARIO</label><br>
                            FAZ. RIO AZUL
                        </p>
                        <div class="sidebar-item" style="background: red">
                            <a href="#" class="sidebar-link">
                                <i class="lni lni-exit sair"></i>
                                <span>Sair</span>
                            </a>
                        </div>
                    </div>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                {{-- botao --}}
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                {{-- drop --}}
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse text-center"
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                {{-- fim drop --}}
                {{-- multi --}}
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed text-center" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse text-center">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- fim multi --}}
            </ul>
        </aside>
        <div class="main">
            <nav style="background: red;height:50px;">
                {{-- nav --}}
                <button type="button" class="btn btn-secondary btns">Secondary</button>
            </nav>
            <div style="margin: 5px">
                {{-- slot --}}
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('public/publico/layout/script/bootstrap.bundle.min.js') }}"></script>
    <script src="publico/layout/script.js"></script>
    <script src="{{ URL::asset('publico/script/jquery-3.7.1.min.js') }}"></script>
    <x-upper.text-upper />
    @include('sweetalert::alert')
    @stack('table_script')
    @stack('script')

</body>

</html>
