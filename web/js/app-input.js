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

    // Auto select left navbar


    // Cost of study
    var disea_grval;
    $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/disease', (data) => {
        $.each(data, (key, value) => {
            if (value.val != null) {
                $('#disea_gr').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            }
        });
    });
    $('#disea_gr').change(() => {
        disea_grval = $('#disea_gr').val();
        console.log(disea_grval);
        getDisea_gr(disea_grval);
    });

    // grpName
    function getDisea_gr(disea_gr) {
        $('#disea_sgrp').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/disease/' + disea_gr, (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#disea_sgrp').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }

    // COST_Design
    function costDesign() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/cost_design/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#cost_design').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    costDesign();

    // COST_Design
    function year_pub() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/year_pub/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#year_pub').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    year_pub();

    // std_design
    function pub_type() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/pub_type/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#pub_type').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    pub_type();

    // std_design
    function std_design() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/std_design/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#std_design').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    std_design();

    function perspect() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/perspect/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#perspect').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    perspect();

    function time_unit() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/time_unit/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#time_unit').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    time_unit();

    function perso_unit() {
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/perso_unit/', (data) => {
            $.each(data, (key, value) => {
                if (value.val != null) {
                    $('#perso_unit').append('<option [value=' + value.val + ']>' + value.val + '</option>');
                }
            });
        })
    }
    perso_unit();

    // srvOffTypeVal
    var srvOffTypeVal;
    $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/srvofftype', (data) => {
        $.each(data, (key, value) => {
            $('#srvOffType').append('<option [value=' + value.val + ']>' + value.val + '</option>');
        });
    });
    $('#srvOffType').change(() => {
        srvOffTypeVal = $('#srvOffType').val();
        console.log(srvOffTypeVal);
        getGrpName(srvOffTypeVal);
    });

    // grpName
    var grpNameVal;

    function getGrpName(srvofftype) {
        $('#grpName').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/ref/' + srvofftype, (data) => {
            $.each(data, (key, value) => {
                $('#grpName').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#grpName').change(() => {
        grpNameVal = $('#grpName').val();
        getItem(srvOffTypeVal, grpNameVal);
    });

    // item
    var itemVal;

    function getItem(srvOffType, grpname) {
        $('#item').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/ref/' + srvOffType + '/' + grpname, (data) => {
            $.each(data, (key, value) => {
                $('#item').append('<option [value=' + value.val + ']>' + value.val + '</option>');
            });
        })
    }
    $('#item').change(() => {
        itemVal = $('#item').val();
        getUnit(srvOffTypeVal, grpNameVal, itemVal);
    });

    // unit
    function getUnit(srvOffType, grpname, item) {
        $('#unit').empty().append('<option value="">เลือก</option>');
        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/ref/' + srvOffType + '/' + grpname + '/' + item, (dat) => {

            let data = dat[0];
            // console.log(data)
            $('#unit').val(data.unit);
            $('#rvu').val(data.rvu);
            $('#genhos').val(data.genhos);
            $('#commhos').val(data.commhos);
        })
    }

    $('#sendForm').click(() => {
        var rObj = {};
        var reformattedArray = $("#inputData").serializeArray().map(obj => {
            rObj[obj.name] = obj.value;
            return rObj;
        });
        const obj = reformattedArray[0];
        // console.log(obj);
        $.post('http://cgi.uru.ac.th:3000/cdpcm/insert_data', obj, (data, stattus) => {
            console.log(stattus);
        })
    });


});