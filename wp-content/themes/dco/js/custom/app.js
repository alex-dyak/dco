(function ($) {
  $(function() {

    var $select = $('select');

    if($select.length > 0) {
      $select.selectBoxIt({
        autoWidth: false
      });
    }

  });
})(jQuery);