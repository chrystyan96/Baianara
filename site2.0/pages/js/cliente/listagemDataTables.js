$(document).ready(function () {
    $('#listarPedidos').dataTable({
        responsive: true,
        "aaSorting": [[0, "desc"]],
        "language": {
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo",
            },
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Desculpe",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros disponíveis",
            "infoFiltered": "(Filtrado de _MAX_ registros)",
            "search": "Procurar:"
        }
    });
});

function format(d) {
    // `d` is the original data object for the row
    return  '<div class="container-fluid">' +
            '<div class="row">' +
            '<table class="table table-striped table-hover" cellspacing="0" width="100%">' +
            '<thead>' +
            '<tr class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1" style="font-weight: bolder;">' +
            '<td>Aviso:</td>' +
            '</tr>' +
            '</thead>' +
            '<tbody>' +
            '<tr class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">' +
            '<td>' + d + '</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '</div>' +
            '</div>';
}

$(document).ready(function () {
    var avisos = $('#listarAvisos').dataTable({
        responsive: true,
        "aaSorting": [[1, "desc"]],
        "language": {
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo",
            },
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Desculpe",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros disponíveis",
            "infoFiltered": "(Filtrado de _MAX_ registros)",
            "search": "Procurar:"
        }
    });
    
    $('#listarAvisos tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = avisos.api().row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            if (row.child() && row.child().length) {
                row.child.show();
            } else {
                row.child(format(tr.attr('aviso'))).show();
            }
            tr.addClass('shown');
        }

    });
});
