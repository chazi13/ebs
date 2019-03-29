// AOS.init();

$(document).ready(function() {
  let prevScrollPos = window.pageYOffset,
      currentScrollPos = 0,
      topMenu = $('#navbar'),
      topMenuHeight = topMenu.outerHeight() + 15,
      menuItems = topMenu.find('a'),
      scrollItems = menuItems.map(function() {
        let item = $($(this).attr('element-target'));
        if (item.leght) { return item }
      })

  if (prevScrollPos > 500) {
    $('.back-to-top').removeClass('invisible').addClass('visible');
  }

  $(window).on('scroll', function () {
    currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
      topMenu.css('top', '0px');
    } else {
      topMenu.css('top', '-100px');
    }
    prevScrollPos = currentScrollPos;

    if (prevScrollPos > 300) {
      $('.back-to-top').removeClass('invisible').addClass('visible');
    } else {
      $('.back-to-top').removeClass('visible').addClass('invisible');
    }

    let fromTop = $(this).scrollTop() + topMenuHeight;
    let cur = scrollItems.map(function() {
      if ($(this).offset().top < fromTop) { return this }
    });
    // cur = cur[cur.leght - 1];
    let id = cur && cur.length ? cur[0].id : "";
    console.log(scrollItems[0].attr('id'));
    menuItems.parent().removeClass('active').end().filter('[element-target="#' + id + '"]').parent().addClass('active');
  });

  $('.navbar-toggler').click(function() {
    topMenu.addClass('bg-purple').removeClass('bg-transparent');
  });

  $('.nav-item a').click(function() {
    let navHeight = topMenu.height();
    $('.nav-item.active').removeClass('active');
    $(this).parent().addClass('active');
    let destination = $(this).attr('element-target');
    
    $('html, body').animate({
      scrollTop: $(destination).position().top,
    }, 1);

    $(destination).position().top - navHeight;
    topMenu.css('top', '0px');
  });
  
  // if ($(window).width() <= 425) {
  //   console.log(window.location.href + 'public/assets/img/banner.png');
  //   $('.banner-background').attr('data-lazy-background', window.location.href + 'public/assets/img/banner-mobile.png');
  //   $('.banner-title').attr('data-pos', "['0%', '9.2%', '30%', '5%']");
  //   $('.banner-content').attr('data-pos', "['40%', '0%', '40%', '5%']");
  //   $('.banner-button').attr('data-pos', "['100%', '9.2%', '65%', '5%']");
  //   $('.img-banner').children().css('display', 'none');
  // }

  // $('.sliders').DrSlider({
  //   height: 500,
  //   navigationType: 'circle',
  //   showProgress: false,
  //   positionNavigation: 'in-center-bottom',
  //   navigationColor: '#ffffff',
  //   navigationHighlightColor: '#3e0f5b',
  //   navigationHoverColor: '#7800bc'
  // });

});
