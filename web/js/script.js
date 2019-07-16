$(document).ready(function () {
    // var table = $('#example').DataTable({
    //     lengthChange: false,
    //     buttons: ['copy', 'excel', 'pdf', 'colvis']
    // });




    const url = "http://cgi.uru.ac.th/cdpcm/web/selectdata.php";
    let table = $('#table').DataTable({
        processing: true,
        ajax: {
            url: url,
            dataSrc: ''
        },
        columns: [{
            //     className: 'details-control',
            //     orderable: true,
            //     data: null,
            //     defaultContent: ''
            // }, {
            data: "id"
        }, {
            // {
            //     orderable: false,
            //     className: 'select-checkbox',
            //     targets: 0
            // },             {
            data: "disea_gr"
        }, {
            data: "disea_sgrp"
        }, {
            data: "title"
        }, {
            data: "author"
        }, {
            data: "std_area"
        }, {
            //     data: "objective"
            // }, {
            data: "cost_design"
            // }, {
            //     "data": "abstract"
        }, {
            data: "year_pub"
        }, {
            //     "data": "orig_link"
            // }, {
            data: "std_year"
        }, {
            data: "std_design"
            // }, {
            //     data: "samp_area"
        }, {
            data: "samp_size"
        }, {
            data: "samp_meth"
            // }, {
            //     data: "missing"
        }, {
            data: "pub_type"
        }, {
            data: "activity0"
            // }, {
            //     data: "activity1"
            // }, {
            //     data: "type_cost0"
            // }, {
            //     data: "type_cost1"
        }, {
            data: "perspect"
        }, {
            data: "time_unit"
        }, {
            data: "perso_unit"
        }, {
            data: "cost_thb"
            // }, {
            //     data: "remark"
        }],
        dom: 'Bfrtip',
        // buttons: [{
        //     extend: 'excel',
        //     text: 'ส่งออกเป็น excel',
        //     className: 'btnMod',
        //     filename: 'cdpcm_excel',
        //     exportOptions: {
        //         modifier: {
        //             page: 'all'
        //         }
        //     }
        // }],
        buttons: ['copy', 'excel', 'colvis'],
        // scrollY: '50vh',
        // scrollY: 200,
        // lengthChange: false,
        iDisplayLength: 5,
        scrollX: true,
        scrollCollapse: true,
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        bAutoWidth: true,
        language: {
            "lengthMenu": "แสดงผล _MENU_ records",
            "zeroRecords": "Nothing found - sorry",
            "info": "หน้า _PAGE_ จาก _PAGES_ หน้า",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "ค้นหาข้อมูล:",
        },
        // "dom": '<"top">rt<"bottom"ip><"clear">',
        order: [
            [1, 'asc']
        ],
    });

    $('#table tbody').on('click', 'tr', function (e) {
        $(this).toggleClass('selected');
        // console.log(table.row(this).data());
        // selData.push(table.row(this).data());
        // console.log(selData);
    });



    // table.buttons().container()
    //     .appendTo('#table_wrapper .col-sm-6:eq(0)');
});