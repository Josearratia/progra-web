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
                } else {
                    console.log(msg);
                }
            }
        });
        return false;
    });
});