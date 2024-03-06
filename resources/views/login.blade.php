<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ URL::asset('publico/layout/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('publico/layout/style.css') }}">
</head>

<body class="bg-gradient-primary" style="background: rgb(93, 93, 93);">
    <div class="container" style="margin-top:10vh">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6" style="width: 50%;height:370px">
                                <img class="flex-grow-1 bg-login-image"
                                    style="width: 100%;height:100%; border-radius:5px 0 0 5px"
                                    src="{{ URL::asset('https://s2-techtudo.glbimg.com/SSAPhiaAy_zLTOu3Tr3ZKu2H5vg=/0x0:1024x609/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2022/c/u/15eppqSmeTdHkoAKM0Uw/dall-e-2.jpg') }}">
                            </div>
                            <div class="col-lg-6" style="width: 50%">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 style="font-size: 25px;font-weight: 900; color:black">{{ env('APP_NAME') }}
                                        </h4>
                                    </div>
                                    <hr>
                                    <form method="POST" action="{{ route('logar') }}" class="user text-center">
                                        @csrf
                                        <div class="mb-3">
                                            <input autocomplete="off" class="upper form-control"
                                                placeholder="Digite seu Usuario" name="name"
                                                style="font-weight: bold;font-size: 15px;color: rgb(0,0,0);" required />
                                        </div>
                                        <div class="mb-3">
                                            <input class="upper form-control" type="password"
                                                placeholder="Digite sua Senha" name="password"
                                                style="font-weight: bold;font-size: 15px;color: rgb(0,0,0);" required />
                                        </div>

                                        <button type="submit" class="btn btn-success btns"
                                            style="margin-top:10px">LOGIN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('publico/script/jquery-3.7.1.min.js') }}"></script>
    <x-select2.select2 />
    <x-upper.text-upper />
    @include('sweetalert::alert')

</body>

</html>
