$(document).ready(function () {
    $('#brand-filter').click(function () {
        if ($(this).next().hasClass('hidden-sm')) {
            $(this).next().removeClass('hidden-sm').removeClass('hidden-xs');
        } else {
            $(this).next().addClass('hidden-sm').addClass('hidden-xs');
        }
    });
});