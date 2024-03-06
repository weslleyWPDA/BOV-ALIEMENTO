<x-layouts.layout>
    @section('nav')
        <a href="{{ route('fazenda.index') }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="post" action="{{ route('fazenda.update', $fazenda->id) }}" autocomplete="off">
        @csrf
        @method('put')
        <h6>EDITAR</h6>
        <div class="form-group">
            <label for="exampleInputEmail1">Fazenda</label>
            <input value="{{ $fazenda->name }}" class="form-control form-control-sm upper" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Produtor</label>
            <input class="form-control form-control-sm upper" value="{{ $fazenda->produtor }}" name="produtor">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Inscrição Estadual</label>
            <input class="form-control form-control-sm upper" value="{{ $fazenda->inscricao }}" name="inscricao">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Municipio</label>
            <input class="form-control form-control-sm upper" value="{{ $fazenda->local }}" name="local">
        </div>
        <div class="button">
            <a href="{{ route('fazenda.index') }}" class="btn btn-danger btns">Cancelar</a>
            <button type="submit" class="btn btn-warning btns">Editar</button>
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
