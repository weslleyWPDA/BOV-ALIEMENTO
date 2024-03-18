<x-layouts.layout>
    @section('nav')
        <a href="{{ route('lotes.index') }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="POST" action="{{ route('abates.update', $lote->id) }}" autocomplete="off">
        <h6>CADASTRAR ABATE DO LOTE {{ $lote->pasto }}</h6>
        @csrf
        @method('put')
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group">
                <label>Data do Abate</label>
                <input type="date" class="form-control form-control-sm upper" name="data_abate" required>
            </div>
        </div>
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group">
                <label>Peso final</label>
                <input class="form-control form-control-sm upper peso" name="peso_saida" required>
            </div>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-success btns">Registrar</button>
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
                width: 40%;
                background-color: var(--forms);
                padding: 20px;
                border-radius: 5px;
                margin: 50px 30% 0 30%
            }

            .form-group {
                width: 100%;
            }

            .form-group label {
                color: white;
                font-size: 13px;
            }

            .form-group input {
                font-size: 13px;
                color: black;
                width: 100%
            }

            .button {
                margin-top: 15px;
                width: 100%;
                text-align: right
            }

            .check {
                margin-top: 10px
            }

            .line {
                margin-left: 5px
            }
        </style>
    @endpush
    @push('script')
        <x-select2.select2 />
        <x-mask.mask />
    @endpush
</x-layouts.layout>
