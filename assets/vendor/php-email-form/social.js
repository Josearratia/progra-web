jQuery(document).ready(function($) {
    "use strict";
    //Social
    $('form.php-social-form').submit(function() {

        var str = $(this).serialize();

        var this_form = $(this);
        var action = $(this).attr('action');

        if (!action) {
            this_form.find('.loading').slideUp();
            this_form.find('.error-message').slideDown().html('¡La propiedad de acción de formulario no está establecida!');
            return false;
        }

        this_form.find('.okey-message').slideUp();
        this_form.find('.error-message').slideUp();
        this_form.find('.loading').slideDown();

        $.ajax({
            type: "POST",
            url: action,
            data: str,
            success: function(msg) {
                this_form.find('.loading').slideUp();
                this_form.find('.okey-message').slideDown().html(msg);
            }
        });
        return false;
    });
});