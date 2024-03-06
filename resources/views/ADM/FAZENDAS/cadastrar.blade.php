<x-layouts.layout>
    @section('nav')
        <a href="{{ route('fazenda.index') }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="POST" action="{{ route('fazenda.store') }}" autocomplete="off">
        <h6>CADASTRAR</h6>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Fazenda</label>
            <input class="form-control form-control-sm upper" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Produtor</label>
            <input class="form-control form-control-sm upper" name="produtor">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Inscrição Estadual</label>
            <input class="form-control form-control-sm upper" name="inscricao">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Municipio</label>
            <input class="form-control form-control-sm upper" name="local">
        </div>
        <div class="button">
            <a href="{{ route('fazenda.index') }}" class="btn btn-danger btns">Cancelar</a>
            <button type="submit" class="btn btn-success btns">Cadastrar</button>
        </div>
    </form>
    @push('css')
        <style>
            h6 {
                color: white;
                font-size: 20px;
                font-weight: 900
            }

            form {
                width: 60%;
                background-color: var(--forms);
                padding: 20px;
                border-radius: 5px;
                margin: 50px 20% 0 20%
            }

            .form-group label {
                color: white;
                font-size: 13px
            }

            .form-group input {
                font-size: 13px;
                color: black;
            }

            .button {
                margin-top: 15px;
                width: 100%;
                text-align: right
            }

            .check {
                margin-top: 10px
            }
        </style>
    @endpush
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layout>
