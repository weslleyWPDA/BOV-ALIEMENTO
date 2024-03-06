<x-layouts.layout>
    @section('nav')
        <a href="{{ route('usuario.create') }}" class="btn btn-success btns">CADASTRAR</a>
    @stop
    <label class="tabela_name">USUARIOS</label>
    <table id="datatables" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>Opções</th>
                <th>Name</th>
                <th>Fazenda</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $dados)
                <tr>
                    <td>
                        <form action="{{ route('usuario.edit', $dados->id) }}" method="get" style="display:inline-block">
                            <button class="lni lni-pencil-alt table_icon" title="Editar!" style="color:#DAA520">
                            </button>
                        </form>
                        <form onclick="return confirm('Deseja realmente EDITAR?');" action="{{ route('user_ativo') }}"
                            method="post" style="display:inline-block">
                            @csrf <button name="id" value="{{ $dados->id }}" class="lni lni-lock-alt table_icon"
                                title="Bloq/Liberar!" style="color:green">
                            </button>
                        </form>
                        <form action="{{ route('usuario.destroy', $dados->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            @method('delete')
                            <button onclick="return perguntaDelete();" class="lni lni-cross-circle table_icon"
                                title="Deletar!" style="color:red">
                            </button>
                        </form>
                    </td>
                    <td>{{ $dados->name }}</td>
                    <td>{{ $dados->fazenda->name }}</td>
                    <td>
                        <div
                            style="background-color:{{ $dados->ativo > null ? 'red' : 'green' }} ; padding:5px;color:white;font-weight:bold!important">
                            {{ $dados->ativo > null ? 'BLOQUEADO' : 'ATIVO' }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-datatables.simplesList tamanho="10" />
</x-layouts.layout>
