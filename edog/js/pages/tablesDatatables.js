/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatable').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 4 ] } ],
                "oLanguage": {
													      "sEmptyTable": "Tiada rekod dijumpai",
													      "sInfoEmpty": "Tiada data dipaparkan",
													      "sInfoFiltered": "( tapisan dari _MAX_ jumlah data )",
													      "sZeroRecords": "Tiada rekod dijumpai"
													    },
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Semua"]]
            });
			
			/* Initialize Datatables */
            $('#datatable-baru').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 4 ] } ],
                "oLanguage": {
													      "sEmptyTable": "Tiada rekod dijumpai",
													      "sInfoEmpty": "Tiada data dipaparkan",
													      "sInfoFiltered": "( tapisan dari _MAX_ jumlah data )",
													      "sZeroRecords": "Tiada rekod dijumpai"
													    },
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Semua"]],
				"dom": 'T<"clear">lfrtip',
				"tableTools":{
					"sSwfPath": "/swf/copy_csv_xls_pdf.swf"
				}
            });

			/* Initialize Datatables */
            $('#datatable-rayuan').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 4 ] } ],
                "oLanguage": {
													      "sEmptyTable": "Tiada rekod dijumpai",
													      "sInfoEmpty": "Tiada data dipaparkan",
													      "sInfoFiltered": "( tapisan dari _MAX_ jumlah data )",
													      "sZeroRecords": "Tiada rekod dijumpai"
													    },
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Semua"]]
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Carian');
        }
    };
}();