import Popper from 'popper.js'
import $ from 'jquery'
import bootstrap from 'bootstrap'

$(function () {
    // Tooltip handling
    $('[data-toggle="tooltip"]').tooltip()

    // Toggle the side navigation
    function sidebar_toggler(e) {
        $("body").toggleClass("sidebar-toggled")
        $(".sidebar").toggleClass("toggled")
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide')
        }
    }

    $("#sidebarToggle, #sidebarToggleTop").on('click', sidebar_toggler)

    if ($( window ).width() < 992) {
        sidebar_toggler(null)
    }
})
