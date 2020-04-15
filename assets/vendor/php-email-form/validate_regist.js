jQuery(document).ready(function($) {
    "use strict";

    //Contact
    $('form.php-email-form').submit(function() {

        var f = $(this).find('.form-group'),
            ferror = false,
            emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;


        function addZero(i) {
            if (i < 10) {
                i = '0' + i;
            }
            return i;
        }

        f.children('input').each(function() { // run all inputs
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth() + 1;
            var yyyy = hoy.getFullYear();

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
                    /* case 'required':
                      if (i.val() === '') {
                        ferror = ierror = true;
                      }
                      break; */

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'pass':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'conf_pass':
                        var x = $('input#pass');

                        if (i.val() != x.val()) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'fecha':
                        if (i.val() != '') {
                            dd = addZero(dd);
                            mm = addZero(mm);
                            var hoy = yyyy + '-' + mm + '-' + dd;
                            var yearsold = yyyy - 3;
                            var cumple = new Date(i.val().replace(/-/g, '\/'));
                            var cumpleyyyy = cumple.getFullYear();
                        } else {
                            ferror = ierror = true;
                        }

                        if (i.val() === hoy) {
                            ferror = ierror = true;
                        } else if (cumpleyyyy > yearsold) {
                            ferror = ierror = true;
                        }
                        break;


                }
                i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });


        if (ferror) {
            return false;
        } else {

            var str = new FormData(this);
            /* var str = $(this).serialize() ;*/
        }

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
            enctype: 'multipart/form-data',
            url: action,
            data: str,
            processData: false,
            contentType: false,
            success: function(msg) {
                if (msg == "Usuario Agregado") {
                    this_form.find('.loading').slideUp();
                    this_form.find('.okey-message').slideDown().html(msg);
                    /* setTimeout(function () { location.href = "dashboard.php" }, 1000); */
                } else {
                    this_form.find('.loading').slideUp();
                    this_form.find('.error-message').slideDown().html(msg);
                }
            }
        });
        return false;
    });
});