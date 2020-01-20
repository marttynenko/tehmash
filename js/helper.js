(function ($) {
  $.fn.custom_load_ajax_modal = function(target) {

    window.setTimeout(function(){
      $.fancybox({
        href: '#'+target,
        autoSize  : true,
        closeBtn: false,
        margin: [30, 0, 30, 0],
        padding: 0,
        helpers: {
            overlay: {
                locked: false
            }
        },
        beforeShow: function() {
            if($('#' + target).find('.consumables__slider').length){
                $('#' + target).find('.consumables__slider').slick({
                    dots: false,
                    prevArrow: '.consumables__list .slide__prev',
                    nextArrow: '.consumables__list .slide__next',
                    infinite: true,
                    slidesToShow: 4,
                    swipeToSlide: true,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $('.consumables__item .card__item-title').matchHeight({
                    byRow: true
                });
            }


        },
        afterShow: function(){
          if($('#' + target).find('.consumables__slider').length){
              $('#' + target).find('.consumables__slider').slick('slickGoTo', 0);
              $('.consumables__item .card__item-title').matchHeight({
                  byRow: true
              });
              $('#' + target).find('.consumables__slider').addClass('active');
          }

        },
        beforeClose: function(){

        },
        afterClose: function() {
          if($('#' + target).find('.consumables__slider').length){
                $('#' + target).find('.consumables__slider').slick('destroy');
                $('#' + target).find('.consumables__slider').removeClass('active');
          }
        }
      });
    }, 100);


  };

  Drupal.behaviors.pnevmoteh_ajax = {
    attach: function (context, settings) {

      $('.modal__close-js, .close-modal').click(function (e) {
          e.preventDefault();
          $.fancybox.close();
          return false;
      });

      $('.custom_use_ajax', context).click(function (e) {
        var data = $(this).data();
        var settings = {
          url: $(this).attr("href"),
          submit : data,
          // submit: {
          //   'target': $(this).data("target"),
          //   'form': $(this).data("form"),
          //   'helper': $(this).data("helper"),
          // },
        };
        var ajax = new Drupal.ajax(false, false, settings);
        ajax.eventResponse(ajax, {});
        e.preventDefault();
      });

    }
  };
}) (jQuery);
