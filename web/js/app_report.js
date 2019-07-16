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


    // select option
    var cat = [];
    var count = [];
    var sum = [];

    $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/tb_stat', (data) => {
        $.each(data, (key, val) => {
            // categories.push(key)
            cat.push(val.name);
            count.push({
                name: val.name,
                y: Number(val.count)
            });
            sum.push(Number(val.sum));
        });

        // count chart
        var countChart = {};
        countChart.chart = {
            type: 'pie'
        };
        countChart.title = {
            text: 'จำนวนรายงาน โรค (Disease)'
        };
        countChart.series = [{
            name: 'Brands',
            colorByPoint: true,
            data: count
        }];
        countChart.credits = {
            enabled: false
        };
        $('#countChart').highcharts(countChart);

        // sum chart
        var sumChart = {};
        sumChart.chart = {
            type: 'column'
        };
        sumChart.title = {
            text: 'จำนวนเงิน โรค (Disease)'
        };
        // sumChart.tooltip = tooltip;
        sumChart.xAxis = {
            categories: cat,
            crosshair: true
        };
        sumChart.yAxis = {
            min: 0,
            title: {
                text: 'จำนวนเงิน (บาท)'
            }
        };
        sumChart.series = [{
            showInLegend: false,
            data: sum
        }];

        sumChart.plotOptions = {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        };
        sumChart.credits = {
            enabled: false
        };
        $('#sumChart').highcharts(sumChart);
    });

    function getYear(disea) {
        var dName = [];
        var dCount = [];

        $.getJSON('http://cgi.uru.ac.th:3000/cdpcm/tb_statyear/' + disea, (data) => {
            $.each(data, (key, val) => {
                // console.log(val);
                dName.push(val.year);
                dCount.push(Number(val.count));
            })

            var diseaChart = {};

            diseaChart.chart = {
                type: 'line'
            };
            diseaChart.title = {
                text: 'จำนวนรายงานแยกตามปี'
            };
            diseaChart.xAxis = {
                categories: dName
            };
            diseaChart.yAxis = {
                title: {
                    text: 'จำนวนรายงาน โรค (Disease)'
                }
            };
            diseaChart.plotOptions = {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            };
            diseaChart.series = [{
                showInLegend: false,
                data: dCount
            }];
            $('#diseaChart').highcharts(diseaChart);
        });
    }
    getYear('Stroke');


    $('#selDisea').change(() => {
        var selDisea = $('#selDisea').val();
        getYear(selDisea);
    });

    // console.log($('#selDisea').val().change());



    // $('#chart2').highcharts(json);




});