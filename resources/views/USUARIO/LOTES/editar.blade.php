<x-layouts.layout>
    @section('nav')
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="post" action="{{ route('usuario.update', $usuario->id) }}" autocomplete="off">
        @csrf
        @method('put')
        <h6>EDITAR</h6>
        <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input class="form-control form-control-sm upper" value="{{ $usuario->name }}" name="name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input placeholder="Digite a senha" class="form-control form-control-sm upper" name="password" required>
        </div>
        <div class="form-group check text-center">
            <label class="form-check-label" for="defaultCheck1">
                Admin
            </label>
            <input {{ $usuario->admin = 1 ? '' : 'checked' }} class="form-check-input" type="checkbox"
                style="font-size: 22px;margin-top:1px" value="1" name="admin">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Fazenda</label>
            <select class="form-control form-control-sm sel" style="width: 100%" required name="fazenda_id">
                <option value="{{ $usuario->fazenda->id }}">{{ $usuario->fazenda->name }}</option>
                @foreach ($fazenda as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="button">
            <a href="{{ route('usuario.index') }}" class="btn btn-danger btns">Cancelar</a>
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
