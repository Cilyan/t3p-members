import "core-js/stable"
import "regenerator-runtime/runtime"

import Chart from 'chart.js'
import $ from 'jquery'

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
Chart.defaults.global.defaultFontColor = '#858796'

$(function () {

    if (typeof charts_config !== 'undefined') {
        for (const chart_conf of charts_config) {
            const ctx = $(chart_conf.id)
            const chart = new Chart(ctx, chart_conf.config)
        }
    }

})
