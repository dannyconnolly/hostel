$(document).ready(function($) {

    $(".table:not(.invoice-table)").tablesorter();

    $('.nav-list li').on('click', function() {
        $('.nav-list li').removeClass('on');
        $(this).addClass('on');
    });
});