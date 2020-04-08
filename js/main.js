var media_sl_en = true;
var dlMap;
jQuery(document).ready(function () {
    if(jQuery('.front__slider').length){
        jQuery('.front__slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplay: true,
            autoplaySpeed: 5000
        });
    }

    if(jQuery('.sound__player').length){
        var sound_name = jQuery('.sound__player').data('sound');
        ion.sound({
            sounds: [
                {
                    name: "s1"
                }
            ],
            volume: 0.7,
            path: "/sounds/"
        });
    }

    jQuery(document).on('click', '.sound__play', function () {
        var sound_name = jQuery(this).closest('.sound__player').data('sound');
        ion.sound.play(sound_name);
    });

    jQuery(document).on('click', '.sound__pause', function () {
        var sound_name = jQuery(this).closest('.sound__player').data('sound');
        ion.sound.pause(sound_name);
    });



    jQuery('.toggle__submenu').on('click', function () {
        var parent = jQuery(this).closest('.submenu');
        jQuery(this).siblings('ul').slideToggle(200);
        jQuery(this).toggleClass('active');
    });

    if(jQuery('.submenu__nav-block').length){
        jQuery('.submenu__nav-block').scrollbar();
    }

    if(jQuery('.card__complect-slider').length){
        jQuery('.card__complect-slider').slick({
            dots: false,
            prevArrow: '.card__complect-slider-wrap .slide__prev',
            nextArrow: '.card__complect-slider-wrap .slide__next',
            infinite: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        fade: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }

    jQuery('.video_play').on('click', function () {
        var parent = jQuery(this).closest('.video__item-block');
        var video_link = jQuery(this).data('video');
        jQuery(".video__item-content", parent).html('<iframe src="https://www.youtube.com/embed/' + video_link + '?autoplay=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>');
        jQuery(".video__item-content", parent).addClass('active');
    });

    jQuery('.scroll__up').on('click', function () {
        jQuery('html, body').stop().animate({
            scrollTop : 0 +  "px"
        }, 800, 'easeInOutExpo');
        event.preventDefault();
    });

    jQuery('.nav-bars').on('click', function () {
        var parent = jQuery(this).closest('.container');
        jQuery('.main__nav', parent).toggleClass('active');
        jQuery(this).toggleClass('active');
    });

    jQuery( '.mobile__nav-menu ul' ).sliderMenu();

    jQuery('.mobile__nav-toggle').on('click', function () {
        jQuery('.mobile__nav-menu').toggleClass('active');
        jQuery(this).toggleClass('active');
        jQuery('.header__main-right').toggleClass('over');
        jQuery('.over-layer').toggleClass('active');
    });

    jQuery('.search__field input').keydown(function () {
        jQuery('.search__auto').addClass('active');
    });

    jQuery('.over-layer').on('click', function () {
        jQuery('.mobile__nav-menu').removeClass('active');
        jQuery('.mobile__nav-toggle').removeClass('active');
        jQuery('.over-layer').removeClass('active');
    });

    if(jQuery('.select__wrap').length){
        jQuery('.select__wrap select').styler();
    }

    jQuery(document).on('click', '.view__links a', function () {
        if(!jQuery(this).hasClass('active')){
            jQuery('.view__links a').removeClass('active');
            jQuery(this).addClass('active');
            if(jQuery(this).data('view') === 'list'){
                jQuery('.cards__list').addClass('cards__list-view');

            }else{
                jQuery('.cards__list').removeClass('cards__list-view');
            }
        }

    });

    if(jQuery('[data-toggle="tooltip"]').length){
        jQuery('[data-toggle="tooltip"]').tooltip();
    }

    jQuery('.cards__filter-toggle a').on('click', function () {
        var parent = jQuery(this).closest('.cards__filter-section');
        parent.toggleClass('active');
        parent.find('.cards__filter-content').slideToggle();
    });

    if(jQuery('.filter__sl').length){
        jQuery('.filter__sl').each(function (index) {
            var sl_elem = jQuery(this);
            var parent = jQuery(this).closest('.cards__filter-section');
            var min = parseInt(sl_elem.data('min'));
            var max = parseInt(sl_elem.data('max'));
            var step = parseInt(sl_elem.data('step'));
            parent.find('.filter__from input').val(parseInt(min));
            parent.find('.filter__end input').val(parseInt(max));

            sl_elem.slider({
                range: true,
                min: min,
                step: step,
                max: max,
                values: [ min, max ],
                slide: function( event, ui ) {
                    parent.find('.filter__from input').val(parseInt(ui.values[ 0 ]));
                    parent.find('.filter__end input').val(parseInt(ui.values[ 1 ]));
                }
            });


        });

    }

    jQuery(document).on('click', '.reset__link', function () {
       jQuery('.cards__filter input[type="checkbox"]').prop('checked', false);
    });

    jQuery('.cards__filter-header').on('click', function () {
        if(jQuery(window).outerWidth() < 767){
            jQuery('.cards__filter-block').slideToggle();
            jQuery(this).toggleClass('active');
        }
    });

    jQuery(document).on('click', '.card__right-analogue .btn__custom-choose', function () {
        jQuery('.analogue__box').show();
        jQuery('.analogue-slider > .row').slick({
            dots: false,
            prevArrow: '.analogue-slider .slide__prev',
            nextArrow: '.analogue-slider .slide__next',
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
        jQuery('.analogue-slider .card__item-title').matchHeight({
            byRow: true
        });
        jQuery('html, body').stop().animate({
            scrollTop : jQuery('.analogue__box').offset().top - 80 +  "px"
        }, 500);
    });



    if(jQuery('.cards__list-slider').length){
        var slides = 3;
        var slides1200 = 2;
        if(jQuery('.card__section').length){
            slides = 4;
            slides1200 = 3;
        }
        jQuery('.cards__list-slider').each(function () {
           var __this = jQuery(this);
           if(__this.find('.card__item').length >= slides){
               __this.addClass('border-fix-theme');
           }
           if(!__this.hasClass('analogue-slider')){
               jQuery('> .row', __this).slick({
                   dots: false,
                   prevArrow: __this.find('.slide__prev'),
                   nextArrow: __this.find('.slide__next'),
                   infinite: true,
                   slidesToShow: slides,
                   swipeToSlide: true,
                   slidesToScroll: 1,
                   responsive: [
                       {
                           breakpoint: 1200,
                           settings: {
                               slidesToShow: slides1200,
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
           }

        });
    }

    jQuery('.phone__custom a').on('click', function (e) {
        if(jQuery(window).width() < 768){
            e.preventDefault();
            e.stopPropagation();
            jQuery('.mobile__phones').toggle();
        }
    });

    jQuery('.form__tabs-switch input').on('change', function () {
        jQuery('.form__tabs-pane').removeClass('active');
        jQuery('.form__tabs-pane').eq(jQuery('.form__tabs-switch input:checked').closest('.radio__wrap').index()).addClass('active');
    });

    if(jQuery(".fancybox").length){
        jQuery(".fancybox").fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            },
            openEffect  : 'none',
            closeEffect : 'none',
            padding: 0
        });
    }

    if(jQuery('.cards__table-wrap').length){
        jQuery('.cards__table-wrap').scrollbar();
        /*var scroll__clone = jQuery('.cards__list-table .scroll-x').clone(true);
        jQuery('.scroll-wrapper.cards__table-wrap').append(scroll__clone);*/
    }



    jQuery(document).on('click', '.compare__remove-js', function () {
        jQuery(this).closest('.compare__item').remove();

        if(jQuery('.compare__item').length < 1){
            jQuery('.compare__empty').show();
            jQuery('.compare__wrap').hide();
        }
    });

    jQuery('body').on('change', '.compare__filter input', function () {
        if(jQuery(this).val() === 'all'){
            jQuery('.compare__equal').each(function () {
                jQuery('.compare__cell:nth-child(' + jQuery(this).index() + ')').fadeIn(250);
            });
        }else{
            jQuery('.compare__equal').each(function () {
                jQuery('.compare__cell:nth-child(' + jQuery(this).index() + ')').fadeOut(250);
            });
        }
    });

    jQuery('.faq__header a, .faq__icon').on('click', function () {
        var parent = jQuery(this).closest('.faq__item');
        if(parent.hasClass('active')){
            parent.removeClass('active');
            parent.find('.faq__answer').slideUp();
        }else{
            jQuery('.faq__item').removeClass('active');
            jQuery('.faq__answer').slideUp();
            parent.addClass('active');
            parent.find('.faq__answer').slideDown();
        }
    });

    if(jQuery('.easyzoom').length && document.documentElement.clientWidth > 992){
        jQuery('.easyzoom').easyZoom();
    }

    if(jQuery('.card__media-slider').length){
        jQuery('.card__media-slider').slick({
            dots: false,
            arrows: false,
            fade: true,
            infinite: true,
            draggable: false,
            swipe: false
        });
    }

    jQuery('.card__media-slider').on('afterChange', function(event, slick, currentSlide){
        media_sl_en = true;
        jQuery('.card__media .video__item-content').html('').removeClass('active');
    });


    jQuery('.card__media-link').on('click', function () {
        var parent = jQuery(this).closest('li');
        if(media_sl_en){
            if(!parent.hasClass('active')){
                jQuery('.card__prevs li').removeClass('active');
                parent.addClass('active');
                jQuery('.card__media-slider').slick('slickGoTo', parent.index());
                media_sl_en = false;
            }
        }
    });

    jQuery(document).on('click', '.minus__item', function () {
        var parent = jQuery(this).closest('.cart__row');
        var input = parent.find('input');
        var value = input.val();
        if(value > 1){
            value--;
            input.val(value);
            jQuery('.commerce-add-to-cart .form-item-quantity input').val(value);
            input.change();
        }
    });

    jQuery(document).on('click', '.plus__item', function () {
        var parent = jQuery(this).closest('.cart__row');
        var input = parent.find('input');
        var value = input.val();
        value++;
        input.val(value);
        jQuery('.commerce-add-to-cart .form-item-quantity input').val(value);
        input.change();
    });

    jQuery(document).on('change', '.counts__field input', function () {
        var parent = jQuery(this).closest('.cart__row');
        var price = parent.data('price');


        jQuery('.commerce-add-to-cart .form-item-quantity input').val(jQuery(this).val()).change();;
        var parent = jQuery(this).closest('form').parent();
        if(parent.hasClass('commerce-line-item-views-form')){
          jQuery('.commerce-line-item-views-form .commerce-line-item-actions button[name=update-cart]').mousedown();
        } else {
          jQuery('.res__value', parent).data('value', Math.round(price * jQuery(this).val() * 100) / 100);
          jQuery('.res__value', parent).text(numberWithSpaces(Math.round(price * jQuery(this).val() * 100) / 100));
          cartSum();
        }
    });



    jQuery('.stars-list li').on('click', function(){
        var onStar = parseInt(jQuery(this).data('value'), 10); // The star currently selected
        var stars = jQuery(this).parent().children('li.star');
        var parent = jQuery(this).parent('.stars-list');
        for (i = 0; i < stars.length; i++) {
            jQuery(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
            jQuery(stars[i]).addClass('selected');
        }
        var ratingValue = parseInt(jQuery('li.selected', parent).last().data('value'), 10);
        jQuery('input', parent).val(ratingValue);
    });

    jQuery('.stars-list li').on('mouseover', function(){
        var onStar = parseInt(jQuery(this).data('value'), 10);
        jQuery(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                jQuery(this).addClass('hover');
            }
            else {
                jQuery(this).removeClass('hover');
            }
        });
    }).on('mouseout', function(){
        jQuery(this).parent().children('li.star').each(function(e){
            jQuery(this).removeClass('hover');
        });
    });

    jQuery(document).on('click', '.consumables__filter a', function () {
        var that = jQuery(this);

        if(!that.hasClass('active')){
            jQuery('.consumables__filter a').removeClass('active');
            that.addClass('active');
            jQuery('.consumables__slider').slick('slickUnfilter');
            jQuery('.consumables__slider').slick('slickFilter', jQuery(this).data('filter'));
            if(jQuery(window).width() < 576){
                jQuery('html, body').stop().animate({
                    scrollTop : jQuery('.consumables__slider').offset().top - 80
                }, 500);
            }
        }
    });

    jQuery(document).on('click', '.next__slide-link', function () {
        jQuery('.card__complect-slider').slick('slickNext');
        jQuery('html, body').stop().animate({
            scrollTop : jQuery('.card__complect-slider-wrap').offset().top - 80 +  "px"
        }, 500);
    });

    jQuery(document).on('click', '.scroll', function (event) {
        if(jQuery(this).attr('href') === '#reviews-form' && jQuery(this).hasClass('btn__custom')){
            jQuery('#reviews-form').slideDown();
        }
        var anchor_link = jQuery(jQuery(this).attr('href')).offset().top;
        jQuery('html, body').stop().animate({
            scrollTop : anchor_link - 50 +  "px"
        }, 1000);


        event.preventDefault();
    });

    jQuery(document).on('click', '.link__toggle-js', function (e) {
        e.preventDefault();
        jQuery('.profile__content-box').removeClass('active');
        jQuery(jQuery(this).attr('href')).addClass('active');
    });

    jQuery(document).on('click', '.add__phone-js', function (e) {
        e.preventDefault();
        jQuery('.field__custom-dop').removeClass('hidden');
        jQuery(this).hide();
    });

    jQuery('.counts__field').on('keydown', 'input', function(e){-1!==jQuery.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

    jQuery(document).on('change', '.consumables__item-block input', function () {
        if(jQuery('.consumables__item-block input:checked').length){
            jQuery('.actions__checked').fadeIn(function () {

            });
        }else{
            jQuery('.actions__checked').fadeOut(function () {

            });
        }

        jQuery(window).trigger('resize');

    });

    jQuery(document).on('click', '.table__body-header', function () {
        var parent = jQuery(this).closest('.table__data-item');
        if(parent.hasClass('active')){
            parent.removeClass('active');
            parent.find('.table__body-content').slideUp();
        }else{
            jQuery('.table__data-item').removeClass('active');
            jQuery('.table__body-content').slideUp();
            parent.addClass('active');
            parent.find('.table__body-content').slideDown();
        }

    });

    if(jQuery('.date__field-range').length){
        var dateFormat = "dd.mm.yyyy",
            from = jQuery(".date__field-from input")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    to.datepicker( "option", "minDate", getDate( this ));
                }),
            to = jQuery(".date__field-to input").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            }).on("change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ));
            });

        function getDate(element) {
            var date;
            try {
                date = jQuery.datepicker.parseDate( dateFormat, element.value);
            } catch( error ) {
                date = null;
            }
            return date;
        }
    }

    matchHeightUpdate();

    jQuery('.modal__open-js').fancybox({
        autoSize  : true,
        closeBtn: false,
        margin: [30, 0, 30, 0],
        padding: 0,
        scrolling : 'no',
        fixed: false,
        fitToView  : false,
        helpers: {
            overlay: {
                locked: false
            }
        },
        beforeShow: function() {
            if(jQuery('.consumables__slider', this.element.attr('href')).length){
                jQuery('.consumables__slider', this.element.attr('href')).slick({
                    dots: false,
                    prevArrow: this.element.attr('href') + ' .consumables__list .slide__prev',
                    nextArrow: this.element.attr('href') + ' .consumables__list .slide__next',
                    infinite: true,
                    slidesToShow: 5,
                    swipeToSlide: true,
                    slidesToScroll: 5,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 380,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                jQuery('.modal__custom-content .consumables__item .card__item-title').matchHeight({
                    byRow: true
                });
            }
        },
        afterShow: function(){
            var __this = this.element;
            if(jQuery('.consumables__slider', __this.attr('href')).length){
                setTimeout(function () {
                    jQuery('.modal__custom-content .consumables__item .card__item-title').matchHeight({
                        byRow: true
                    });
                    jQuery('.consumables__slider', __this.attr('href')).addClass('active');
                }, 1000);
                jQuery('.consumables__slider', __this.attr('href')).slick('slickGoTo', 0);
            }

            if(jQuery(this.element.attr('href')).hasClass('modal__custom-delivery')){
                if(jQuery('#delivery-map').length){
                    ymaps.ready(initDeliveryMap(jQuery('.modal__custom-delivery .radio__box-item.checked').data('lt'), jQuery('.modal__custom-delivery .radio__box-item.checked').data('lg')));
                }
            }
        },
        beforeClose: function(){

        },
        afterClose: function() {
            if(jQuery('.consumables__slider', this.element.attr('href')).length){
                jQuery('.consumables__slider', this.element.attr('href')).slick('destroy');
                jQuery('.consumables__slider', this.element.attr('href')).removeClass('active');
            }
        }
    }).click(function() {
        if (typeof(jQuery(this).data('from')) !== 'undefined') {

        }
    });

    jQuery('.modal__close-js, .close-modal').on('click', function(e) {
        e.preventDefault();
        jQuery.fancybox.close();
        return false;
    });

    jQuery(document).on('click', '.tab__show-js', function (e) {
        e.preventDefault();
        jQuery('.nav-tabs a[href="' + jQuery(this).attr('href') + '"]').tab('show');
    });

    jQuery(document).on('click', '.step__switch-js', function (e) {
        e.preventDefault();
        var parent = jQuery(this).closest('.checkout__content-box');
        parent.find('.checkout__content, .step__switch-js').removeClass('active');

        jQuery(jQuery(this).attr('href')).addClass('active');
        jQuery(this).addClass('active');
    });

    jQuery(document).on('change', '.checkout__step [type="radio"]', function () {
        var parent = jQuery(this).closest('.radio__box-item');
        var box = jQuery(this).closest('.radio__box');
        box.find('.radio__box-item').removeClass('checked');
        parent.addClass('checked');
    });

    jQuery(document).on('click', '.checkout__content button', function (e) {
        e.preventDefault();

        var parent = jQuery(this).closest('.checkout__content-box');
        var current = jQuery(this).closest('.checkout__step');
        var next = jQuery(this).closest('.checkout__step').next('.checkout__step');
        parent.find('.checkout__content').removeClass('active');
        jQuery(this).closest('.checkout__content').next('.checkout__content').addClass('active');
        jQuery(this).addClass('active');
        current.addClass('filled');
        next.addClass('active');
        jQuery('.checkout__data-list-block').slick('slickSetOption', 'infinite', true, true);
        if(current.prev('.checkout__step').hasClass('filled')){
            current.prev('.checkout__step').addClass('filled-decor')
        }
        if(next.index() === 3){
            jQuery('.checkout__bottom').addClass('active');
        }
    });

    jQuery(document).on('click', '.radio__box-item', function () {
        var parent = jQuery(this);
        var box = jQuery(this).closest('.radio__box');
        if(parent.find('[type="radio"]').length < 2){
            box.find('.radio__box-item').removeClass('checked');
            parent.addClass('checked');
            parent.find('input').prop('checked', true).change();
        }

        if(box.hasClass('radio__box-modal')){
            dlMap.destroy();
            initDeliveryMap(parent.data('lt'), parent.data('lg'));
        }
    });

    if(jQuery('.checkout__data-list').length){
        jQuery('.checkout__data-list').scrollbar();
    }

    if(jQuery('.checkout__data-list-block').length){
        jQuery('.checkout__data-list-block').slick({
            dots: false,
            arrows: false,
            infinite: true,
            variableWidth: true,
            swipeToSlide: true,
            focusOnSelect: true
        });
    }

    /*jQuery(document).on('click', '.checkout__data-item', function () {
        var box = jQuery(this).closest('.checkout__data-list-block');
        if(!jQuery(this).hasClass('active')){
            jQuery('.checkout__data-item', box).removeClass('active');
            jQuery(this).addClass('active');
        }
    });*/

    jQuery(document).on('change', '.load__file-wrap input', function () {
        jQuery(this).closest('.load__file-wrap').find('.file__info').text(this.value);
        jQuery(this).closest('.load__file-wrap').find('button').removeAttr('disabled');
    });

    jQuery(document).on('click', '.cities__list a', function () {
        var parent = jQuery(this).closest('li');
        if(!parent.hasClass('active')){
            jQuery('.cities__list li').removeClass('active');
            parent.addClass('active');
        }
    });

    jQuery('.nav__marker').each(function () {
        var _this = jQuery(this);
        var wp_dw = new Waypoint({
            element: _this,
            handler: function(direction) {
                if (direction === 'down') {
                    jQuery('.spy li').removeClass('active');
                    jQuery('.scroll[href="#' + _this.attr('id') + '"]').closest('li').addClass('active');
                }
            },
            offset: 80

        });

        var wp_up = new Waypoint({
            element: _this,
            handler: function(direction) {
                if (direction === 'up') {
                    jQuery('.spy li').removeClass('active');
                    jQuery('.scroll[href="#' + _this.attr('id') + '"]').closest('li').addClass('active');
                }
            },
            offset: -100

        });
    });

    if(jQuery('.phone__mask-by input').length){
        jQuery('.phone__mask-by input').inputmask("(99) 999-99-99", {
            showMaskOnHover: false
        });
    }

    if(jQuery('.phone__mask-ru input').length){
        jQuery('.phone__mask-ru input').inputmask("(999) 999-99-99", {
            showMaskOnHover: false
        });
    }

    jQuery(document).on('click', '.compare__add-js', function () {
        jQuery(this).toggleClass('active');
    });

    if(jQuery('.content .consumables__slider').length){
        jQuery('.content .consumables__slider').slick({
            dots: false,
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 5,
            draggable: false,
            drag: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        jQuery('.consumables__item .card__item-title').matchHeight({
            byRow: true
        });
    }

   /* jQuery('.nav__marker').each(function () {
        jQuery(this).waypoint(function(direction) {
            if (direction === 'up') {
                if(!jQuery(this).hasClass('section')){

                    jQuery('.submenu').find('li').removeClass('active');
                }else{
                    jQuery('[data-point]').closest('li').removeClass('active');
                    jQuery('.main-nav').attr('data-active', jQuery(this).prev('[data-place]').data('place'));
                }
                jQuery('[data-point="' + jQuery(this).prev('[data-place]').data('place') + '"]').closest('li').addClass('active');
                jQuery('[data-point="' + jQuery(this).prev('[data-place]').data('place') + '"]').closest('li').find('li:last').addClass('active');
                if(jQuery('.submenu li.active').length){
                    jQuery('.submenu').scrollLeft(jQuery('.submenu li.active').offset().left);
                }
            }
        }, {
            offset: '0px',
            triggerOnce: false
        }).waypoint(function (direction) {
            if (direction === 'down') {
                jQuery('.spy li').removeClass('active');
                jQuery('.scroll[href="' + jQuery(this).attr('id') + '"]').closest('li').addClass('active');
            }
        }, {
            offset: '0',
            triggerOnce: false
        });
    });*/

    if(jQuery('[data-toggle="popover"]').length){
        jQuery('[data-toggle="popover"]').popover();
    }

    jQuery(document).on('click', '.sch-item a, .sch-subitem a', function (e) {
        var target = jQuery(this).attr('href');
        e.preventDefault();
        jQuery('html, body').stop().animate({
            scrollTop : jQuery(target).offset().top - 80 + "px"
        }, 700);
        jQuery('.table__schema tr').removeClass('active');
        jQuery(target).addClass('active');

    });

    jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
        if(jQuery('.fancybox-opened .table__custom-cart').length){
            cartModalSum();
        }
        if(settings.url === '/views/ajax'){
            matchHeightUpdate();
        }
    });

    if(window.location.hash) {
        var hash = window.location.hash;
        if(hash === '#reviews-form'){
            jQuery('.card__reviews-info .btn__custom.scroll').trigger('click');
        }
    }

    jQuery(document).on('click', '.delivery__section input[type="radio"]', function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    jQuery(document).on('change', '.delivery__section input[type="radio"]', function () {
        var parent = jQuery('.delivery__section input[type="radio"]:checked').closest('.radio__box-item');

        if(!jQuery('.collapse-address').hasClass('active')){
            jQuery('.collapse-address').addClass('active');
        }
        if(!parent.hasClass('radio__box-item-empty')){
            jQuery('.collapse-address').removeClass('no-address');
        }else{

            jQuery('.collapse-address').addClass('no-address');
        }
    });
});

jQuery(window).scroll(function (e) {
    var y = jQuery(window).scrollTop();
    if(y > jQuery('.content').offset().top){
        jQuery('.header__fixed').addClass('active');
    }else{
        jQuery('.header__fixed').removeClass('active');
        jQuery('.main__nav').removeClass('active');
        jQuery('.nav-bars').removeClass('active');
    }

    if(y > 1200){
        jQuery('.scroll__up').addClass('active');
    }else{
        jQuery('.scroll__up').removeClass('active');
    }
});

jQuery(window).on('load', function () {
   jQuery('.compare__wrap').addClass('active');
    matchHeightUpdate();

});

function numberWithSpaces(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

function matchHeightUpdate() {
    if(jQuery('.card__item-box .card__item-title').length){
        jQuery('.card__item-box .card__item-title').matchHeight({
            byRow: true
        });
    }

    if(jQuery('.card__complect-item .card__item-title').length){
        jQuery('.card__complect-item .card__item-title').matchHeight({
            byRow: true
        });
    }

    if(jQuery('.consumables__item .card__item-title').length){
        jQuery('.consumables__item .card__item-title').matchHeight({
            byRow: true
        });
    }

    if(jQuery('.card__complect-block').length){
        // setTimeout(function(){
        //     jQuery('.card__complect-block').matchHeight({
        //         byRow: false
        //     });
        // },200)
    }

    if(jQuery('.compare__item-top').length){
        jQuery('.compare__item-top').matchHeight({
            byRow: false
        });
    }

    if(jQuery('.compare__block').length){
        jQuery('.compare__block').scrollbar();
    }

    if(jQuery('.compare__item-box-bottom').length){
        jQuery('.compare__item-box-bottom').matchHeight({
            byRow: false
        });
    }


}

function initDeliveryMap(lt, lg) {
    dlMap = new ymaps.Map('delivery-map', {
        center: [lt, lg],
        zoom: 14,
        type: 'yandex#publicMap',
        controls: ['zoomControl']
    });

    if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
        dlMap.behaviors.disable('multiTouch');
        dlMap.behaviors.disable('drag');
    }

    dlMap.behaviors.disable(['scrollZoom']);

    var placemark = new ymaps.Placemark([lt, lg], {}, {
        iconLayout: 'default#image',
        iconImageHref: '/images/marker.png',
        iconImageSize: [25, 36],
        iconImageOffset: [-12, -36]
    });

    dlMap.geoObjects.add(placemark);

}

function cartSum() {
    var sum = 0;
    jQuery('.res__value').each(function () {
        console.log(jQuery(this).data('value'));
        sum += jQuery(this).data('value');
    });

    jQuery('.cart__result .cart__res').text(numberWithSpaces(Math.round(sum * 100) / 100));
}

function cartModalSum() {
    var sum = 0;
    jQuery('.res__value').each(function () {
        sum += parseFloat(jQuery(this).text());
    });

    jQuery('.table__result span').text(numberWithSpaces(Math.round(sum * 100) / 100) + ' руб.');
}


$(window).on('load',function(){
    matchHeightUpdate();
})