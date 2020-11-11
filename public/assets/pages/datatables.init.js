/*
 Template Name: Admiria - Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Datatable js
 */

$(document).ready(function() {
    $('#datatable').DataTable({ 
        "language": {
            search: '<i class="fa fa-search" aria-hidden="true"></i>',
            searchPlaceholder: 'بحث',
            "paginate": {
                "previous": "السابق",
                "next": "التالى",
            },
                "decimal":        "",
                "emptyTable":     "لا يوجد بيانات",
                "info":           "عرض من _START_ الى _END_ من _TOTAL_ صف",
                "infoEmpty":      "",
                 "thousands":      ",",
                "lengthMenu":     "عرض _MENU_ صف",
                "loadingRecords": "جاري التحميل",
                "processing":     "يتم التحميل",
                 "zeroRecords":    "لا يوجد بيانات",
               
        },
        "paging":   true,
        "ordering": true,
        "info":     true
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );



$(document).ready(function() {
    $('#datatable2').DataTable({ 
        "language": {
            search: '<i class="fa fa-search" aria-hidden="true"></i>',
            searchPlaceholder: 'بحث',
            "paginate": {
                "previous": "السابق",
                "next": "التالى",
            },
                "decimal":        "",
                "emptyTable":     "لا يوجد بيانات",
                "info":           "عرض من _START_ الى _END_ من _TOTAL_ صف",
                "infoEmpty":      "",
                 "thousands":      ",",
                "lengthMenu":     "عرض _MENU_ صف",
                "loadingRecords": "جاري التحميل",
                "processing":     "يتم التحميل",
                 "zeroRecords":    "لا يوجد بيانات",
        },
        "paging":   true,
        "ordering": true,
        "info":     true
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );