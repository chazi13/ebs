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
  
  if ($(window).width() <= 425) {
    console.log(window.location.href + 'public/assets/img/banner.png');
    $('.banner-background').attr('data-lazy-background', window.location.href + 'public/assets/img/banner-mobile.png');
    $('.banner-title').attr('data-pos', "['0%', '9.2%', '30%', '5%']");
    $('.banner-content').attr('data-pos', "['40%', '0%', '40%', '5%']");
    $('.banner-button').attr('data-pos', "['100%', '9.2%', '65%', '5%']");
    $('.img-banner').children().css('display', 'none');
  }

  $('.sliders').DrSlider({
    height: 500,
    navigationType: 'circle',
    showProgress: false,
    positionNavigation: 'in-center-bottom',
    navigationColor: '#ffffff',
    navigationHighlightColor: '#3e0f5b',
    navigationHoverColor: '#7800bc'
  });

});
