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

    // srvOffTypeVal
    var srvOffTypeVal;
    $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/srvofftype', (data) => {
        $.each(data, (key, value) => {
            $('#srvOffType').append('<option [value=' + value.val + ']>' + value.val + '</option>');
        });
    });
    $('#srvOffType').change(() => {
        srvOffTypeVal = $('#srvOffType').val();
        getGrpName(srvOffTypeVal);
    });

    // grpName
    var grpNameVal;

    function getGrpName(srvofftype) {
        $('#grpName').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/grpname/' + srvofftype, (data) => {
            $.each(data, (key, value) => {
                $('#grpName').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#grpName').change(() => {
        grpNameVal = $('#grpName').val();
        getItem(grpNameVal);
    });

    // item
    var itemVal;

    function getItem(grpname) {
        $('#item').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/item/' + grpname, (data) => {
            $.each(data, (key, value) => {
                $('#item').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#item').change(() => {
        itemVal = $('#item').val();
        getUnit(itemVal);
    });

    // unit
    var unitVal;

    function getUnit(itemval) {
        $('#unit').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/unit/' + itemval, (data) => {
            $.each(data, (key, value) => {
                $('#unit').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#unit').change(() => {
        unitVal = $('#unit').val();
        getRvu(unitVal);
    });


    // rvu
    var rvuVal;

    function getRvu(unitval) {
        $('#rvu').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/rvu/' + unitval, (data) => {
            $.each(data, (key, value) => {
                $('#rvu').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#rvu').change(() => {
        rvuVal = $('#rvu').val();
        getGenHos(rvuVal);
    });

    // genHos
    var genHosVal;

    function getGenHos(rvuval) {
        $('#GenHos').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/genhos/' + rvuval, (data) => {
            $.each(data, (key, value) => {
                $('#GenHos').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#GenHos').change(() => {
        genHosVal = $('#GenHos').val();
        getCommHos(rvuVal);
    });

    // commHost
    var commHosVal;

    function getCommHos(genhos) {
        $('#CommHos').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/commhos/' + genhos, (data) => {
            $.each(data, (key, value) => {
                $('#CommHos').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#CommHos').change(() => {
        commHosVal = $('#CommHos').val();
        // console.log(commHosVal);
    });

    $('#sendForm').click(() => {
        var rObj = {
            'id': id
        };
        var reformattedArray = $("#inputData").serializeArray().map(obj => {
            rObj[obj.name] = obj.value;
            return rObj;
        });
        const obj = reformattedArray[0];
        console.log(obj);
        $.post('http://cgi.uru.ac.th:3000/cdpcm/insert_data', obj, (data, stattus) => {
            console.log(stattus);
        })
    });

    // Cost of study
    $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/getselected/' + id, (d) => {
        var data = d[0];
        console.log(data);
        $('#disea_gr').val(data.disea_gr);
        $('#disea_sgrp').val(data.disea_sgrp);
        $('#title').val(data.title);
        $('#author').val(data.author);
        $('#std_area').val(data.std_area);
        $('#objective').val(data.objective);
        $('#cost_design').val(data.cost_design);
        $('#abstracts').val(data.abstract);
        $('#year_pub').val(data.year_pub);
        $('#orig_link').val(data.orig_link);
        $('#std_year').val(data.std_year);
        $('#std_design').val(data.std_design);
        $('#samp_area').val(data.samp_area);
        $('#samp_size').val(data.samp_size);
        $('#samp_meth').val(data.samp_meth);
        $('#missing').val(data.missing);
        $('#pub_type').val(data.pub_type);
        $('#srvofftype').val(data.srvofftype);
        $('#grpname').val(data.activity0);
        $('#item').val(data.activity1);
        $('#type_cost0').val(data.type_cost0);
        $('#type_cost1').val(data.type_cost1);
        $('#perspect').val(data.perspect);
        $('#time_unit').val(data.time_unit);
        $('#perso_unit').val(data.perso_unit);
        $('#cost_thb').val(data.cost_thb);
        $('#remark').val(data.remark);
    });



});