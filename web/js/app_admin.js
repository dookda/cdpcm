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

    // datatable
    const url = 'http://cgi.uru.ac.th:3000/cdpcm/tb_getMember';

    // New record
    $('a.editor_create').on('click', function (e) {
        e.preventDefault();

        editor.create({
            title: 'Create new record',
            buttons: 'Add'
        });
    });

    // Edit record
    $('#user').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();

        editor.edit($(this).closest('tr'), {
            title: 'Edit record',
            buttons: 'Update'
        });
    });

    var tb = $('#user').DataTable({
        "ajax": url,
        "columns": [{
            "data": "id_user"
        }, {
            "data": "id_pass"
        }, {
            "data": "firstname"
        }, {
            "data": "lastname"
        }, {
            "data": "pdesc"
        }, {
            data: null,
            className: "center",
            defaultContent: '<button id="remove" class="btn btn-danger btn-block">ลบผู้ใช้งาน</button>'
        }]
    });

    // delete user
    var selUser;
    $('#user tbody').on('click', '#remove', function (e) {
        selUser = tb.row($(this).parents('tr')).data();
        $('#removeModal').modal();
        $('#rm_id').html(selUser.id);
        $('#rm_id_user').html(selUser.id_user);
        $('#rm_firstname').html(selUser.firstname);
        $('#rm_lastname').html(selUser.lastname);
        // alert(data[0] + "'s salary is: " + data[5]);
    });

    $('#btnYesDel').on('click', () => {
        console.log(selUser);
        $.post('http://cgi.uru.ac.th:3000/cdpcm/removeuser', {
            id: selUser.id,
            id_user: selUser.id_user
        }, (data, status) => {
            tb.ajax.reload(null, false);
        })
    })

    // add user
    $('#addUser').click((r) => {
        $('#addModal').modal();
    });

    $('#btnAddUsr').on('click', () => {
        var id_user = $('#add_id_user').val();
        var id_pass = $('#add_id_pass').val();
        var firstname = $('#add_firstname').val();
        var lastname = $('#add_lastname').val();
        var pdesc = $('#add_pdesc').val();
        // console.log(id_user);
        $.post('http://cgi.uru.ac.th:3000/cdpcm/insertuser', {
            id_user: id_user,
            id_pass: id_pass,
            firstname: firstname,
            lastname: lastname,
            pdesc: pdesc
        }, (data, status) => {
            tb.ajax.reload(null, false);
        })
    })
});