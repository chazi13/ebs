AOS.init();

$(document).ready(function() {
  let prevScrollPos = window.pageYOffset;
  
  if (prevScrollPos == 0) {
    $('#navbar').css('top', '0px').removeClass('bg-purple').addClass('bg-transparent');
  }

  if (prevScrollPos > 500) {
    $('.back-to-top').removeClass('invisible').addClass('visible');
  }

  $(window).on('scroll', function () {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) {
      if (currentScrollPos == 0) {
        $('#navbar').css('top', '0px').removeClass('bg-purple').addClass('bg-transparent');
      } else {
        $('#navbar').css('top', '0px').removeClass('bg-transparent').addClass('bg-purple');
      }
    } else {
      $('#navbar').css('top', '-100px');
    }
    prevScrollPos = currentScrollPos;

    if (prevScrollPos > 300) {
      $('.back-to-top').removeClass('invisible').addClass('visible');
    } else {
      $('.back-to-top').removeClass('visible').addClass('invisible');
    }
  });

  $('.navbar-toggler').click(function() {
    $('#navbar').addClass('bg-purple').removeClass('bg-transparent');
  });

  $('.sliders').DrSlider({
    navigationType: 'circle',
    showProgress: false,
    positionNavigation: 'in-center-bottom',
    navigationColor: '#ffffff',
    navigationHighlightColor: '#3e0f5b',
    navigationHoverColor: '#7800bc'
  });
});
