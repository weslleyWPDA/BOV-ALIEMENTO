@push('table_css')
    <link rel="stylesheet" href="{{ URL::asset('publico/datatables/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('publico/datatables/css/tabelas.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush
@push('table_script')
    <script src="{{ URL::asset('publico/datatables/scripts/dataTables.js') }}"></script>
    <script src="{{ URL::asset('publico/datatables/scripts/dataTables.bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                language: {
                    sUrl: "{{ URL::asset('publico/datatables/pt_BR.json') }}"
                },
                "iDisplayLength": {{ $tamanho ?? '10' }},
                scrollX: true,
                scrollY: "350px",
                scrollCollapse: true,
            });
        });

        function perguntaDelete() {
            return confirm('Deseja realmente DELETAR?');
        }
    </script>
@endpush
