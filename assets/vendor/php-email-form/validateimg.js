jQuery(document).ready(function ($) {
  "use strict";

  //Contact
  $('form.php-email-form').submit(function () {

    var f = $(this).find('.form-group'),
      ferror = false;


    f.children('input').each(function () { // run all inputs

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

        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });


    if (ferror){
      return false;
    } 
    else{
      
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
    /* console.log(str); */
    
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: action,
      data: str,
      processData: false,
      contentType: false,
      success: function (msg) {
        if (msg == "Archivo guardado") {
          this_form.find('.loading').slideUp();
          this_form.find('.okey-message').slideDown().html(msg);
        } else {
          this_form.find('.loading').slideUp();
          this_form.find('.error-message').slideDown().html(msg);
        }
      }
    });
    return false;
  });
});