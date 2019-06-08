window.Popper = require('popper.js')

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery')

require('bootstrap');

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
