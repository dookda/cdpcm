$(function () {
    "use strict";
    $(function () {
        $(".preloader").fadeOut();
    });
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
    // This is for the top header part and sidebar part
    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 70;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").addClass("ti-menu");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
            $(".sidebartoggler i").removeClass("ti-menu");
        }

        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);
    // Theme options    
    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $(".scroll-sidebar, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible");
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
            $(".sidebartoggler i").addClass("ti-menu");
        } else {
            $("body").trigger("resize");
            $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").removeClass("ti-menu");
        }
    });
    // topbar stickey on scroll
    $(".fix-header .topbar").stick_in_parent({

    });

    $('.floating-labels .form-control').on('focus blur', function (e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("mdi mdi-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".sidebartoggler").on('click', function () {
        //$(".sidebartoggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });
    // Right sidebar options 
    $(".right-side-toggle").click(function () {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");
    });


    $.fn.dataTable.ext.buttons.select = {
        action: function (e, dt, node, config) {
            $('#myModal').modal('show');
            const data = table.rows('.selected').data();
            $('#da').empty();
            var col = Math.round(12 / data.length);
            for (var i = 0; i < data.length; i++) {
                console.log(i);
                // console.log(data[i].id);
                var txt = `<div class='col-${col}'>
                    <b>กลุ่มโรค (Cluster): </b>${data[i].disea_gr}<p>            
                    <b>โรค (Disease): </b>${data[i].disea_sgrp}<p>
                    <b>ชื่อการศึกษา (Study title): </b>${data[i].title}<p>            
                    <b>ผู้ศึกษา (Author's name): </b>${data[i].author}<p>
                    <b>จังหวัดที่ศึกษา (Study area): </b>${data[i].std_area}<p>            
                    <b>วัตถุประสงค์ของการศึกษา (Objective of study): </b>${data[i].objective}<p>
                    <b>Economic Evaluation Model: </b>${data[i].cost_design}<p>            
                    <b>บทคัดย่อ (Abstract): </b>${data[i].abstract}<p>
                    <b>ปีที่ตีพิมพ์ (Publish year): </b>${data[i].year_pub}<p>            
                    <b>Oiginal source: </b>${data[i].orig_link}<p>
                    <b>ปีที่ศึกษา (Study year): </b>${data[i].std_year}<p>            
                    <b>รูปแบบการศึกษา (Study design): </b>${data[i].std_design}<p>
                    <b>พื้นที่ศึกษา (Study area): </b>${data[i].samp_area}<p>            
                    <b>ขนาดตัวอย่าง (Sample size): </b>${data[i].samp_size}<p>
                    <b>วิธีการสุ่มตัวอย่าง (Sampling method): </b>${data[i].samp_meth}<p>            
                    <b>Missing data: </b>${data[i].missing}<p>
                    <b>แหล่งที่เผยแพร่ (Publish type): </b>${data[i].pub_type}<p>            
                    <b>ชื่อกลุ่มประเภทการให้บริการ: </b>${data[i].activity0}<p>
                    <b>รายการการให้บริการ: </b>${data[i].activity1}<p>            
                    <b>ที่มาต้นทุน (Direct/Indirect): </b>${data[i].type_cost0}<p>
                    <b>Sub type of costing: </b>${data[i].type_cost1}<p>            
                    <b>มุมมองของต้นทุน: </b>${data[i].perspect}<p>
                    <b>หน่วยเวลาที่วัด: </b>${data[i].time_unit}<p>            
                    <b>หน่วยรับบริการ: </b>${data[i].perso_unit}<p>            
                    <b>ราคาต้นทุน (บาท): </b>${data[i].cost_thb}<p>            
                    <b>หมายเหตุ: </b>${data[i].remark}<p>
                    <div>
                `;
                $('#da').append(txt);
            };
        }
    };


    $.fn.dataTable.ext.buttons.edit = {

        action: (e, dt, node, config) => {
            const data = table.rows('.selected').data();

            if (data.length == 0) {
                console.log('unn')
            } else {
                window.open('./form_edit.php?id=' + data[0].id);
            }
        }
    }

    // data tables
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
        buttons: [{
            extend: 'excel',
            text: 'ส่งออกเป็น excel',
            // className: 'btn-group',
            filename: 'cdpcm_excel',
            exportOptions: {
                modifier: {
                    page: 'all'
                }
            }
        }, {
            extend: 'select',
            text: 'ดูข้อมูลที่เลือก',
            // className: 'btn-group'
        }, {
            extend: 'edit',
            text: 'แก้ไขข้อมูล',
            // className: 'btn-group'
        }, {
            extend: 'colvis',
            text: 'เลือกคอลัมน์'
        }],
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
        ]
    });

    var selData = [];

    $('#table tbody').on('click', 'tr', function (e) {
        $(this).toggleClass('selected');
        // console.log(table.row(this).data());
        // selData.push(table.row(this).data());
        // console.log(selData);
    });

    $('#myInput').on('keyup', function () {
        table.search(this.value).draw();
    });


    function otherData(d) {
        return '<span><h5>Abstract: </h5> ' + d.abstract + '</span>';
    }

    $('#myInput').on('keyup', function () {
        table.search(this.value).draw();
    });

    table.buttons().container()
        .appendTo('#table_wrapper .col-sm-6:eq(0)');



    function createFilter(table, columns) {
        var input = $('<input class="form-control" type="text">').on("keyup", function () {
            table.draw();
        });

        $.fn.dataTable.ext.search.push(function (
            settings,
            searchData,
            // index,
            // rowData,
            // counter
        ) {
            var val = input.val().toLowerCase();
            for (var i = 0, ien = columns.length; i < ien; i++) {
                if (searchData[columns[i]].toLowerCase().indexOf(val) !== -1) {
                    console.log(table.page.info().recordsDisplay);
                    $('#count').html(table.page.info().recordsDisplay)
                    return true;
                }
            }
            return false;
        });
        return input;
    }
    // var table = $("#table").DataTable();
    var filter0 = createFilter(table, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]);
    // var filter1 = createFilter(table, [0, 1]);
    // var filter2 = createFilter(table, [2]);
    // var filter3 = createFilter(table, [3]);
    // var filter4 = createFilter(table, [4]);
    // var filter5 = createFilter(table, [5]);
    // var filter6 = createFilter(table, [6]);
    // var filter7 = createFilter(table, [7]);
    // var filter8 = createFilter(table, [8]);
    // var filter9 = createFilter(table, [9]);
    // var filter10 = createFilter(table, [10]);
    // var filter11 = createFilter(table, [11]);
    // var filter12 = createFilter(table, [12]);
    // var filter13 = createFilter(table, [13]);
    // var filter14 = createFilter(table, [14]);
    // var filter15 = createFilter(table, [15]);
    // var filter16 = createFilter(table, [16]);
    // var filter17 = createFilter(table, [17]);
    // var filter18 = createFilter(table, [18]);
    // var filter19 = createFilter(table, [19]);
    // var filter20 = createFilter(table, [20]);
    // var filter21 = createFilter(table, [21]);
    // var filter22 = createFilter(table, [22]);
    // var filter23 = createFilter(table, [23]);
    // var filter24 = createFilter(table, [24]);

    // filter0.appendTo("#d0");
    // filter1.appendTo("#d1");
    // filter2.appendTo("#d2");
    // filter3.appendTo("#d3");
    // filter4.appendTo("#d4");
    // filter5.appendTo("#d5");
    // filter6.appendTo("#d6");
    // filter7.appendTo("#d7");
    // filter8.appendTo("#d8");
    // filter9.appendTo("#d9");
    // filter10.appendTo("#d10");
    // filter11.appendTo("#d11");
    // filter12.appendTo("#d12");
    // filter13.appendTo("#d13");
    // filter14.appendTo("#d14");
    // filter15.appendTo("#d15");
    // filter16.appendTo("#d16");
    // filter17.appendTo("#d17");
    // filter18.appendTo("#d18");
    // filter19.appendTo("#d19");
    // filter20.appendTo("#d20");
    // filter21.appendTo("#d21");
    // filter22.appendTo("#d22");
    // filter23.appendTo("#d23");
    // filter24.appendTo("#d24");

});