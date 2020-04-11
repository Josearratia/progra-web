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
                if (msg == "dls") {
                    setTimeout(function() { location.href = "eliminarrol.php" }, 1000);
                } else if (msg == "consolaac") {
                    setTimeout(function() { location.href = "eliminar.php" }, 1000);
                } else if (msg == "juegoac") {
                    setTimeout(function() { location.href = "eliminar.php" }, 1000);
                } else if (msg == "torneoac") {
                    setTimeout(function() { location.href = "eliminar.php" }, 1000);
                } else if (msg == "dulceriaac") {
                    setTimeout(function() { location.href = "eliminar.php" }, 1000);
                } else if (msg == "Participando") {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "../../dashboard.php" }, 1000);
                } else if (msg == "Ya te encuentras participando") {
                    this_form.find('.loading').slideUp();
                    this_form.find('.error-message').slideDown().html(msg);
                } else {
                    this_form.find('.loading').slideUp();
                    this_form.find('.error-message').slideDown().html(msg);
                    console.log(msg);
                }
            }
        });
        return false;
    });
});