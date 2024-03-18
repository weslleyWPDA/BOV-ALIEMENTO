<x-layouts.layout>
    @section('nav')
        <a href="{{ route('lotes.create') }}" class="btn btn-success btns">CADASTRAR</a>
    @stop
    <label class="tabela_name">Lotes</label>
    <table id="datatables" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>Opções</th>
                <th>Pasto</th>
                <th>Tipo_Pasto</th>
                <th>Cabeças</th>
                <th>Categoria</th>
                <th>GMD</th>
                <th>Peso_Entrada</th>
                <th>Dias</th>
                <th>Projeçao</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lotes as $dados)
                <tr>
                    <td>
                        <form action="{{ route('trato.show', $dados->id) }}" method="post" style="display:inline-block">
                            @csrf
                            @method('get')
                            <button class="bi bi-card-list table_icon" title="Trato!" style="color:blue">
                            </button>
                        </form>
                        <form action="{{ route('lotes.edit', $dados->id) }}" method="get"
                            style="display:inline-block">
                            <button class="bi bi-pencil-square table_icon" title="Editar!" style="color:#DAA520">
                            </button>
                        </form>
                        <form action="{{ route('abates.edit', $dados->id) }}" method="get"
                            onclick="return confirm('Deseja realmente FINALIZAR?');" style="display:inline-block">
                            <button class="bi bi-box-arrow-left table_icon" title="Finalizar!" style="color:green">
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
                    <td>{{ $dados->pasto }}</td>
                    <td>{{ $dados->tipo_capim }}</td>
                    <td>{{ $dados->quant_cabeca }}</td>
                    <td>{{ $dados->categoria_bov }}</td>
                    <td>{{ $dados->gmd }}</td>
                    <td>{{ $dados->peso_entrada }}</td>
                    <td>{{ $dados->quant_dias }}</td>
                    <td>{{ 0.9 * $dados->quant_dias + $dados->peso_entrada }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-datatables.simplesList tamanho="10" />
</x-layouts.layout>
