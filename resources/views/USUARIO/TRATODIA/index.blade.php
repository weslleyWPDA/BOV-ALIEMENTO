<x-layouts.layout>
    @section('nav')
        <a href="{{ route('lotes.index') }}" class="btn btn-secondary btns">VOLTAR</a>
        <form action="{{ route('trato.create') }}" method="post" style="display:inline-block">
            @csrf
            @method('get')
            <button class="btn btn-success btns" title="Trato!" name="id" value="{{ $lote->id }}">CADASTRAR TRATO
            </button>
        </form>
    @stop
    <div style="display: inline-flex;width:100%" class="">
        <div class="form-group line">
            <label>{{ $lote->pasto }} com {{ $lote->quant_cabeca }} Cabeças, comendo {{ $lote->racao_diaria }} Kg
                diário. </label>
        </div>
    </div>
    <table id="datatables" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>Opções</th>
                <th>Data</th>
                <th>Total_Trato</th>
                <th>Kg/Cabeça</th>
                <th>Categoria_Produto</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($trato as $dados)
                <tr>
                    <td>
                        <form action="{{ route('lotes.edit', $dados->id) }}" method="get"
                            style="display:inline-block">
                            <button class="bi bi-pencil-square table_icon" title="Editar!" style="color:#DAA520">
                            </button>
                        </form>
                        <form action="{{ route('lotes.destroy', $dados->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            @method('delete')
                            <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                title="Deletar!" style="color:red">
                            </button>
                        </form>
                    </td>
                    <td>{{ date('d/m/Y', strtotime($dados->data)) }}</td>
                    <td>{{ $dados->total_trato }}</td>
                    <td>{{ $dados->lote->racao_diaria / $dados->lote->quant_dias }}</td>
                    <td>{{ $dados->categoria_produto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @push('script')
        <x-datatables.simplesList tamanho="10" />
    @endpush
    @push('css')
        <style>
            div .form-group label {
                color: black;
                font-weight: 900;
                padding: 0 5px 0 5px;
            }
        </style>
    @endpush
</x-layouts.layout>
