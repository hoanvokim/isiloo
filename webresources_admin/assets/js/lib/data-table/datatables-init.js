(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/
    $('#bootstrap-data-table').DataTable({
        "order": [[4, "desc"]],
        stateSave: true,
        "pagingType": "full_numbers",
        lengthMenu: [[10, 30, 50, -1], [10, 30, 50, "Xem tất Cả"]],
        pageLength: 30
    });

    $('#all-category-data-table').DataTable({
        "order": [[1, "asc"]],
        stateSave: true,
        "pagingType": "full_numbers",
        lengthMenu: [[10, 30, 50, -1], [10, 30, 50, "Xem tất Cả"]],
        pageLength: 30
    });

    $('#bootstrap-data-table-export').DataTable({
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#row-select').DataTable({
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });


})(jQuery);