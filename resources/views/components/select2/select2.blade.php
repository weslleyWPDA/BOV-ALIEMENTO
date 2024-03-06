{{-- select2  e so colocar na classe do select a classe sel --}}
<script src="{{ URL::asset('/publico/select2/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ URL::asset('/publico/select2/js/select2.min.js') }}"></script>
<link href="{{ URL::asset('/publico/select2/css/select2.min.css') }}" rel="stylesheet" />
<script>
    $(".sel").select2({
        width: 'resolve', // need to override the changed default
        placeholder: "Selecione",
        language: "ptbr",
        allowClear: false,
        "language": {
            "noResults": function() {
                return 'Não encontrado';
            }
        },
    });
</script>
<style>
    .select2-selection {
        height: 31px !important;
        vertical-align: middle;
        font-size: 13px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: black !important
    }
</style>
