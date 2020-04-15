jQuery(document).ready(function($) {
    "use strict";
    //Social
    $('form#Table-Id').submit(function() {

        var str = $(this).serialize();

        var this_form = $(this);
        var action = $(this).attr('action');


        $.ajax({
            type: "POST",
            url: action,
            data: str,
            success: function(msg) {
                if (msg = "Venta Realizada") {
                    console.log(msg);
                } else {
                    console.log(msg);
                }
            }
        });
        return false;
    });
});