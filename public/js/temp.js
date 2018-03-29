if ($('.hero').hasClass('is-transparent')) {
  if ($(window).width() >= 1024) {
    $('html').css({
      'overflow': 'hidden'
    });
  } else{
    $('html').css({
      'overflow': 'auto'
    });
  }
}