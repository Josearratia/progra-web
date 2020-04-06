jQuery(document).ready(function($) {
    "use strict";
    //Social
    $('form#eliminar').submit(function() {

        var str = $(this).serialize();

        var this_form = $(this);
        var action = $(this).attr('action');


        $.ajax({
            type: "POST",
            url: action,
            data: str,
            success: function(msg) {
                if (msg = "Borrado") {
                    this_form.find('.btn').removeClass('btn-danger');
                    this_form.find('.btn').addClass('btn-success');
                    this_form.find('.btn').attr("value", "Activar");
                    this_form.attr('id', "activar");
                    this_form.attr('action', "forms/activar.php");
                } else if (msg = "errorbd") {
                    this_form.find('.btn').removeClass('btn-danger');
                    this_form.find('.btn').addClass('btn-warning');
                } else {

                }
            }
        });
        return false;
    });
});

jQuery(document).ready(function($) {
    "use strict";
    //Social
    $('form#activar').submit(function() {

        var str = $(this).serialize();

        var this_form = $(this);
        var action = $(this).attr('action');


        $.ajax({
            type: "POST",
            url: action,
            data: str,
            success: function(msg) {
                if (msg = "Activado") {
                    this_form.find('.btn').removeClass('btn-success');
                    this_form.find('.btn').addClass('btn-danger');

                    this_form.find('.btn').attr("value", "Eliminar");
                    this_form.attr('id', "eliminar");
                    this_form.attr('action', "forms/eliminar.php");
                } else if (msg = "errorbd") {
                    this_form.find('.btn').removeClass('btn-success');
                    this_form.find('.btn').addClass('btn-warning');
                } else {

                }
            }
        });
        return false;
    });
});