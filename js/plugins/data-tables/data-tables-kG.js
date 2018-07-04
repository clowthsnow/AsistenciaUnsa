$(document).ready(function () {
    $('#data-table-simple').DataTable();

    var table = $('#data-table-row-grouping').DataTable({
        "columnDefs": [
            {"visible": false, "targets": 2}
        ],
        "order": [[2, 'desc']],
        "displayLength": 100,
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page: 'current'}).nodes();
            var last = null;

            api.column(2, {page: 'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                            '<tr class="group"><td colspan="3">' + group + '</td></tr>'
                            );

                    last = group;
                }
            });
        }
    });

    // Order by the grouping
    $('#data-table-row-grouping tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });



    var table = $('#data-table-row-grouping-j').DataTable({
        "columnDefs": [
            {"visible": false, "targets": 2}
        ],
        "order": [[2, 'desc']],
        "displayLength": 100,
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page: 'current'}).nodes();
            var last = null;

            api.column(2, {page: 'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                            '<tr class="group"><td colspan="3">' + group + '</td></tr>'
                            );

                    last = group;
                }
            });
        }
    });

    // Order by the grouping
    $('#data-table-row-grouping-j tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    
    
    
    var table = $('#data-table-row-grouping-v').DataTable({
        "columnDefs": [
            {"visible": false, "targets": 2}
        ],
        "order": [[2, 'desc']],
        "displayLength": 100,
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page: 'current'}).nodes();
            var last = null;

            api.column(2, {page: 'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                            '<tr class="group"><td colspan="3">' + group + '</td></tr>'
                            );

                    last = group;
                }
            });
        }
    });

    // Order by the grouping
    $('#data-table-row-grouping-v tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });

});
    