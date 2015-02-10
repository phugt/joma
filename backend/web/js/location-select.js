$(document).ready(function () {
    locationSelect();
    $('select[for=province]').change(function () {
        $('select[for=district]').val(0);
        locationSelect();
    });
});

function locationSelect() {
    var province = $('select[for=province]').val();
    $('select[for=district] option[value!=0]').hide();
    for (var i = 0; i < districts.length; i++) {
        if (districts[i].provinceId == province) {
            $('select[for=district] option[value=' + districts[i].id + ']').show();
        }
    }
}