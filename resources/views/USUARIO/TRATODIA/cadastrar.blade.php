<x-layouts.layout>
    @section('nav')
        <a href="{{ route('trato.show', $lote->id) }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="POST" action="{{ route('trato.store') }}" autocomplete="off">
        <h6>CADASTRAR TRATO lote {{ $lote->id }}</h6>
        @csrf
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group line">
                <label>Trato KG Total</label>
                <input class="form-control form-control-sm upper peso" name="total_trato" required>
            </div>
            <div class="form-group line">
                <label>Categoria Produto</label>
                <input type="text" class="form-control form-control-sm upper" name="categoria_produto" required>
            </div>
        </div>
        <div style="display: inline-flex;width:40%;margin-left:30%" class="justify-content-center">
            <div class="form-group line">
                <label>Data</label>
                <input type="date" class="form-control form-control-sm upper text-center" value="{{ $data }}"
                    name="data" required>
            </div>
        </div>
        <input hidden name="lote_id" value="{{ $lote->id }}" />
        <div class="button">
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
                width: 80%;
                background-color: var(--forms);
                padding: 20px;
                border-radius: 5px;
                margin: 50px 10% 0 10%
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
