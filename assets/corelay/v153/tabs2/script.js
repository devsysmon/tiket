;(function() {

  'use strict';

  var $url = $('.js-url');
  var $tab = $('.js-tab');
  var $frame = $('.js-frame');

  $url.on('click', function() {
    $(this).select();
  });

  $url.on('keydown', function(event) {

    if (event.keyCode !== 13) return;

    var $currentTab = $tab.filter(function() {
      return $(this).hasClass('is-active');
    });

    var $currentFrame = $frame.filter(function() {
      return $(this).hasClass('is-active');
    });
    
    var id = $currentFrame.data('frame');
    
    if (id === 0) { 
      $currentFrame.replaceWith('<iframe class="c-frame js-frame is-active" data-frame="0" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1"></iframe>');
    } else {
      $currentFrame.attr('src', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1');
    }

    $url.val('https://www.youtube.com/embed/dQw4w9WgXcQ');

    $currentTab.find('.c-tab__title').text('Rick Astley - Never Gonna Give You Up');
    $currentTab.find('.c-tab__favicon .fa').removeClass('fa-codepen').addClass('fa-youtube-play');
  });

  $(document).on('click', '.js-tab', function() {

    var id = $(this).data('frame');

    var $currentTab = $tab.filter(function() {
      return $(this).data('frame') === id;
    });

    var $currentFrame = $frame.filter(function() {
      return $(this).data('frame') === id;
    });

    var url = $currentFrame.attr('data-src');

    $url.val(url);

    $tab.removeClass('is-active');
    $frame.removeClass('is-active');

    $currentTab.addClass('is-active');
    $currentFrame.addClass('is-active');
  });

})();