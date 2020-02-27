jQuery(document).ready(function(){


  var cardComplSlick = $('.card__complect-slick');
  if (cardComplSlick.find('.card__complect-slide').length > 1) {
    cardComplSlick.slick({
      slidesToShow: 4,
      dots: false,
      infinite: false,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 360,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }

  $('.card__goods-slick').slick({
    slidesToShow: 5,
    dots: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 360,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.card__sliders-tabs a').tabs();

  $('.card__sliders-tabs a').bind('click',function(){
    let $hash = $(this).attr('href'),
        $slick = $($hash).find('.slick-slider');
    if ($slick.length) {
      setTimeout(function(){
        $slick.slick("slickSetOption", '', false, true);
      },100);
    }
  });

  $(document).on('click','.header__mobile-action',function(e){
    e.preventDefault();
    var $this = $(this);
    var $target = $(this).data('target');
    if ($target != undefined && $target != '') {
      $('.header__mobile-action').not($this).removeClass('active');
      $(this).toggleClass('active');
      $('.header__mobile-drop').not('.'+$target).removeClass('opened');
      $('.'+$target).toggleClass('opened');
    }
  });

  $(document).on('click','.to-print',function(e){
    e.preventDefault();
    window.print();
  });

  $('.card-tabs a').each(function(key,item){
    var $hash = $(item).attr('href');
    var $txt = $(item).text();
    $($hash).before('<div class="mobile-card-tab"><a href="'+$hash+'">'+$txt+'</a></div>');
  });

  //изменено 2.12.19
  /*$(document).on('click','.mobile-card-tab a',function(e){
    e.preventDefault();
    var $hash = $(this).attr('href');
    if ($(this).hasClass('selected')) {return}
    $('.card-tabs a[href="'+$hash+'"]').click();
    $('.mobile-card-tab a').removeClass('selected');
    $(this).addClass('selected');
  });*/

  $('.mobile__menu-catalog li').each(function(key,item){
    if($(item).find('ul').length) {
      $(item).children('a').addClass('childs-in').append('<i class="childs-toggler" onclick=""></i>');
    }
  });

  $(document).on('click','.childs-toggler',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $(this).parent().toggleClass('opened').next('ul').slideToggle('fast');
  });

  $(document).on('click','.header__mobile-mtoggler',function(e){
    $('.mobile__menu-overlay').toggleClass('opened');
  });

  if ( $('.cards__filter-sticky').length ) {
    $('.flex-wrapper').addClass('sticky-in');
  }

  $(document).on('click','.quick__params-mtoggler',function(e){
    e.preventDefault();
    $(this).toggleClass('collapsed');
    $(this).closest('.quick__params').toggleClass('collapsed');
  });

  $(document).on('click','.sub__categories-mtoggler',function(e){
    e.preventDefault();
    $(this).toggleClass('collapsed');
    $(this).closest('.sub__categories').toggleClass('collapsed');
  });

  $(document).on('click','.sorting__mobile-toggler',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $('.sorting__box-left').slideToggle('fast');
  });

  $(document).on('click','.view__links-svg a',function(e){
    e.preventDefault();
    setTimeout(function(){
      if ( !$(this).hasClass('active') ) {
        $('.products__list').toggleClass('view-list');
      }
    },10);
  }); 

  if(matchMedia) {
		var screen768 = window.matchMedia('(max-width:768px)');
		screen768.addListener(changes);
		changes(screen768);
	}
	function changes(screen768) {
		if(screen768.matches) {
      $('.cards__filter').appendTo($('.filters-sorting__mobile'));
      
      $('.col-f-phones').prependTo($('.footer__top > .row'))
		} else {
      $('.filters-sorting__mobile .cards__filter').appendTo($('.side__box-filters'));
      
      $('.footer__top .col-f-phones').insertAfter($('.footer__bottom .col-f-wide'));
		}
  }
  
  $(document).on('click','.filters__mobile-toggler',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $('.filters-sorting__mobile .cards__filter').slideToggle('fast');
  });

  $(document).on('click','.contacts__anchors a',function(e){
    e.preventDefault();
    var $hash = $(this).attr('href');
    if ($($hash).length) {
      var $offset = $($hash).offset().top;
      $('html,body').animate({
        'scrollTop':$offset - 70
      },150);
    }
  });

  $(".fancy-inline").fancybox();


  $(document).on('click','.toggle_by_attr',function(e){
    e.preventDefault();
    var $target = $(this).data('target');
    $(this).toggleClass('opened');
    $($target).toggleClass('opened');
  });


  /* --- new from 2.12.19 --- */
  $(document).on('mouseup',function(e){
    if ($('.header__contacts').has(e.target).length === 0){
      $('.header__contacts-drop').removeClass('opened');
      $('.header__contacts-phone-toggler').removeClass('opened');
    }
  });


  $(document).on('click','.mobile-card-tab a',function(e){
    e.preventDefault();
    var $tabs = $('.tab-slider-content');
    var $hash = $(this).attr('href');
    var $slick = $($hash).find('.slick-slider');
    $tabs.not($($hash)).removeClass('opened');
    $('.mobile-card-tab a').not($(this)).removeClass('selected');
    $($hash).toggleClass('opened');
    $(this).toggleClass('selected');

    if ($slick.length) {
      setTimeout(function(){
        $slick.slick('refresh');
        jQuery('.card__complect-block').matchHeight({
            byRow: false
        });
      },100);
    }
  });


  $(document).on('click','.cards__filter-informer-icon',function(e){
    var $block = $(this).closest('.cards__filter-informer-wrap');
    $block.toggleClass('transformed');
  });

  if ($('.spy-new').length) {
    var $spyHeight = $('.spy-new').innerHeight();
    $('.wrapper').css({
      'paddingBottom':$spyHeight+'px'
    })
  }



  if(matchMedia) {
    var screen570 = window.matchMedia('(max-width:570px)');
    screen570.addListener(changes570);
    changes570(screen570);
  }
  function changes570(screen570) {
    if(screen570.matches) {
      if ( $('.card__result').length ) {
        $('.card__result').prependTo($('.card__btn-list'));
        $('.card__btn-list').addClass('card__btn-list_result');
      }
    } else {
      $('.card__result').appendTo($('.cart__row'));
      $('.card__btn-list_result').removeClass('card__btn-list_result');
    }
  }
  

  $('.footer__title.toggled').on('click',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $(this).next().find('ul').slideToggle(200);
  });


  if (document.querySelector('.breadcrumbs') && document.documentElement.clientWidth < 570) {
    document.querySelector('.breadcrumbs').scrollBy(1000,0);
  }

  $('.installment-tabs a').tabs();

  //скроллим по якорям и переключаем табы
  $('.scroll-by-anchors').on('click','a',function(e){
    e.preventDefault();
    var $hash = $($(this).attr('href'));
    if (!$hash.length) return;
    var $tab = $hash.closest('.installment-tab');
    
    if ($tab.length) {
      if ($tab.is(':visible')) {
        let $offset = $hash.offset().top;
        $('html,body').animate({
          scrollTop: $offset - 60
        },200);
      } else {
        let $tabID = $tab.attr('id');
        $('.installment-tabs a[href="#'+$tabID+'"]').click();
        setTimeout(function(){
          let $offset = $hash.offset().top;
          $('html,body').animate({
            scrollTop: $offset - 60
          },200);
        },200);
      }
    } else {
      let $offset = $hash.offset().top;
      $('html,body').animate({
        scrollTop: $offset - 60
      },200);
    }
    
  })

});

