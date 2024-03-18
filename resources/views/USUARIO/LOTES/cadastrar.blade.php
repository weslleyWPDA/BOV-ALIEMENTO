<x-layouts.layout>
    @section('nav')
        <a href="{{ route('lotes.index') }}" class="btn btn-secondary btns">VOLTAR</a>
    @stop
    <form method="POST" action="{{ route('lotes.store') }}" autocomplete="off">
        <h6>CADASTRAR LOTE</h6>
        @csrf
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group">
                <label>Pasto</label>
                <input class="form-control form-control-sm upper" name="pasto" required>
            </div>
            <div class="form-group line">
                <label>Área de Pasto</label>
                <input class="form-control form-control-sm upper" name="area_pasto" required>
            </div>
            <div class="form-group line">
                <label>Cabeças</label>
                <input type="number" class="form-control form-control-sm upper" name="quant_cabeca" required>
            </div>
        </div>
        {{-- ------------------------------- --}}
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group ">
                <label>Categoria Bov</label>
                <input class="form-control form-control-sm upper" name="categoria_bov" required>
            </div>
            <div class="form-group line">
                <label>GMD</label>
                <input class="form-control form-control-sm upper" name="gmd" required>
            </div>
            <div class="form-group line">
                <label>Tipo Capim</label>
                <input class="form-control form-control-sm upper" name="tipo_capim" required>
            </div>
        </div>
        <div style="display: inline-flex;width:100%" class="justify-content-center">
            <div class="form-group">
                <label>Peso Entrada</label>
                <input type="number" class="form-control form-control-sm upper" name="peso_entrada" required>
            </div>
            <div class="form-group line">
                <label>Data Entrada</label>
                <input type="date" class="form-control form-control-sm upper" name="data_entrada" required>
            </div>
            <div class="form-group line">
                <label>Dias de Cocho</label>
                <input type="number" class="form-control form-control-sm upper" name="quant_dias" required>
            </div>
            <div class="form-group line">
                <label>Categoria Produto</label>
                <input class="form-control form-control-sm upper" name="categoria_produto" required>
            </div>
        </div>
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
    @endpush
</x-layouts.layout>
