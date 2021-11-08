let baseurl = window.location.origin;

$(document).ready(function () {
    $("#categoria-ajax").select2({
        placeholder: "Busque por uma categoria!",
        multiple: true,
        ajax: {
            url: baseurl + "/empresas/buscar-por/nome",
            dataType: 'json',
            delay: 250,
            type: 'post',
            data: function (params) {
                return {
                    nome: params.term, // search term
                };
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
        }
    });

    $('#categoria-ajax').select2('val', 1);

    $('.select').select2();

});
