jQuery(document).ready(function($) {
    "use strict";

    //Contact
    $('form.promociones-form').submit(function() {

        var f = $(this).find('.form-group'),
            ferror = false;
        f.children('input').each(function() { // run all inputs


            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        } else {
                            if (i.val() === 'e') {
                                ferror = ierror = true;
                            }
                        }
                        break;



                }
                i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });


        if (ferror) return false;
        else var str = $(this).serialize();

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
                if (msg == 'Datos Guardados') {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "modificar.php" }, 1000);
                    modificarrol
                } else if (msg == 'Venta realizada') {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "renta.php" }, 1000);
                    modificarrol
                } else if (msg == 'Rol Guardado') {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "modificarrol.php" }, 1000);

                } else if (msg == 'Guardado') {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "view_promociones.php" }, 1000);
                } else if (msg == "Datos Guardados De Relacion") {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    setTimeout(function() { location.href = "agregar.php" }, 1000);
                } else {
                    this_form.find('.loading').slideUp();
                    this_form.find('.error-message').slideDown().html(msg);
                }
            }
        });
        return false;
    });
});