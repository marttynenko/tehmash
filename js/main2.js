var media_sl_en = true;
jQuery(document).ready(function () {
    if(jQuery('.front__slider').length){
        jQuery('.front__slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            pauseOnHover: false,
            pauseOnFocus: false
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
        jQuery('.over-layer').toggleClass('active');
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
            if($(this).data('view') === 'list'){
                $('.cards__list').fadeTo("100", 0, function () {
                    $('.cards__list').addClass('cards__list-view');
                    setTimeout(function () {
                        $('.cards__list').fadeTo("100", 1);
                    }, 100);
                });

            }else{
                $('.cards__list').fadeTo("100", 0, function () {
                    $('.cards__list').removeClass('cards__list-view');
                    setTimeout(function () {
                        $('.cards__list').fadeTo("100", 1);
                    }, 100);
                });
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

    if(jQuery('.cards__list-slider').length){
        var slides = 3;
        if(jQuery('.card__section').length){
            slides = 4;
        }
        jQuery('.cards__list-slider > .row').slick({
            dots: false,
            prevArrow: '.cards__list-slider .slide__prev',
            nextArrow: '.cards__list-slider .slide__next',
            infinite: true,
            slidesToShow: slides,
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
            openEffect	: 'none',
            closeEffect	: 'none',
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

    jQuery('.faq__header a').on('click', function () {
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

    if(jQuery('.easyzoom').length){
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
            input.change();
        }
    });

    jQuery(document).on('click', '.plus__item', function () {
        var parent = jQuery(this).closest('.cart__row');
        var input = parent.find('input');
        var value = input.val();
        value++;
        input.val(value);
        input.change();
    });

    jQuery(document).on('change', '.counts__field input', function () {
        console.log(jQuery(this).val());
        var parent = jQuery(this).closest('.cart__row');
        var price = parent.data('price');
        jQuery('.res__value', parent).text(numberWithSpaces(Math.round(price * jQuery(this).val())));
    });

    if(jQuery('.consumables__slider').length){
        jQuery('.consumables__slider').slick({
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
    }

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
        var parent = jQuery(this).closest('li');

        if(!parent.hasClass('active')){
            jQuery('.consumables__filter li').removeClass('active');
            parent.addClass('active');
            jQuery('.consumables__slider').slick('slickUnfilter');
            jQuery('.consumables__slider').slick('slickFilter', jQuery(this).data('filter'));
            if(jQuery(window).width() < 576){
                jQuery('html, body').stop().animate({
                    scrollTop : jQuery('.consumables__list').offset().top - 80 +  "px"
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
        var anchor_link = jQuery(jQuery(this).attr('href')).offset().top;
        jQuery('html, body').stop().animate({
            scrollTop : anchor_link - 50 +  "px"
        }, 1000);
        event.preventDefault();
    });

    $(document).on('click', '.link__toggle-js', function (e) {
        e.preventDefault();
        $('.profile__content-box').removeClass('active');
        $($(this).attr('href')).addClass('active');
    });

    $(document).on('click', '.add__phone-js', function (e) {
        e.preventDefault();
        $('.field__custom-dop').removeClass('hidden');
        $(this).hide();
    });

    $('.counts__field').on('keydown', 'input', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

    $(document).on('change', '.consumables__item-block input', function () {
        if($('.consumables__item-block input:checked').length){
            $('.actions__checked').fadeIn();
        }else{
            $('.actions__checked').fadeOut();
        }
    });

    $(document).on('click', '.table__body-header', function () {
        var parent = $(this).closest('.table__data-item');
        if(parent.hasClass('active')){
            parent.removeClass('active');
            parent.find('.table__body-content').slideUp();
        }else{
            $('.table__data-item').removeClass('active');
            $('.table__body-content').slideUp();
            parent.addClass('active');
            parent.find('.table__body-content').slideDown();
        }

    });

    if($('.date__field-range').length){
        var dateFormat = "dd.mm.yyyy",
            from = $(".date__field-from input")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    to.datepicker( "option", "minDate", getDate( this ));
                }),
            to = $(".date__field-to input").datepicker({
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
                date = $.datepicker.parseDate( dateFormat, element.value);
            } catch( error ) {
                date = null;
            }
            return date;
        }
    }

    matchHeightUpdate();
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
            byRow: false
        });
    }

    if(jQuery('.card__complect-item .card__item-title').length){
        jQuery('.card__complect-item .card__item-title').matchHeight({
            byRow: false
        });
    }

    if(jQuery('.consumables__item .card__item-title').length){
        jQuery('.consumables__item .card__item-title').matchHeight({
            byRow: true
        });
    }

    if(jQuery('.card__complect-block').length){
        jQuery('.card__complect-block').matchHeight({
            byRow: false
        });
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