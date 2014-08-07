(function ($) {

Drupal.behaviors.greatistLoginBlock = {
  attach: function (context, settings) {
    var $context = $(context);
    $context.find('.login-link')
      .once()
      .click(function (event) {
        $context.find('#ajax-register-user-login-block-wrapper').toggle();
        $(this).toggleClass('open');
      });
  }
};

}(jQuery));
;
