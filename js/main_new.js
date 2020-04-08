//lazy load для сторонних либ
function lazyLibraryLoad(scriptSrc,linkHref,callback) {
  let script = document.createElement('script');
  script.src = scriptSrc;
  document.querySelector('script[src*="main_new.js"]').before(script);

  if (linkHref !== '') {
    let style = document.createElement('link');
    style.href = linkHref;
    style.rel = 'stylesheet';
    document.querySelector('link[href*="style.css"]').before(style);
  }

  script.onload = callback
}


jQuery(document).ready(function(){

  var cardComplSlick = $('.card__complect-slick');
  if (cardComplSlick.find('.card__complect-slide').length > 1) {
    cardComplSlick.slick({
      slidesToShow: 1,
      dots: false,
      infinite: false,
      adaptiveHeight: true
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
        breakpoint: 380,
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

  /* $(document).on('click','.childs-toggler',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $(this).parent().toggleClass('opened').next('ul').slideToggle('fast');
  }); */
  $(document).on('click','.mobile__menu .childs-in',function(e){
    e.preventDefault();
    $(this).find('.childs-toggler').toggleClass('opened');
    $(this).toggleClass('opened').next('ul').slideToggle('fast');
  });

  $(document).on('click','.header__mobile-mtoggler',function(e){
    $('.mobile__menu-overlay').toggleClass('opened');
  });
  $(document).on('click','.mobile__menu-overlay',function(e){
    $(this).removeClass('opened');
    $('.header__mobile-mtoggler').removeClass('active');
    $('.mobile__menu').removeClass('opened');
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

  function getHash(href){
    var str = href.split('#');
    return '#' + str[1];
  }

  $(window).on('load', function () {
    var hash = window.location.hash;
    if (hash){
      pt_scroll(hash);
    }
  });

  $('.scroll-by-anchors').on('click', 'a', function (e) {
    e.preventDefault();
    pt_scroll(getHash($(this).attr('href')));
  });

  function pt_scroll(hash){
    var $hash = $(hash);
    if (!$hash.length) return;

    var $tab = $hash.closest('.installment-tab');
    if ($tab.length) {
        if ($tab.is(':visible')) {
            var $offset = $hash.offset().top;
            $('html,body').animate({
                scrollTop: $offset - 60
            },200);
        } else {
            var $tabID = $tab.attr('id');
            $('.installment-tabs a[href="#'+$tabID+'"]').click();
            setTimeout(function(){
                var $offset = $hash.offset().top;
                $('html,body').animate({
                    scrollTop: $offset - 60
                },200);
            },200);
        }
    } else {
        var $offset = $hash.offset().top;
        $('html,body').animate({
            scrollTop: $offset - 60
        },200);
    }
  }


  $('input.styler, select.styler').styler();

  $('.slick-consumables').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },{
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },{
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },{
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },{
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.slick-usefulvideo').slick({
    vertical: true,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          vertical: false,
          variableWidth: true,
          slidesToScroll: 1,
          slidesToShow: 1
        }
      }
    ]
  });

  $(document).on('click','.question-item-title',function(e){
    e.preventDefault();
    $(this).toggleClass('opened');
    $(this).next().toggleClass('opened');
  });

  $('.slick-usefullarticles').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    infinite: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 992,
        settings: {
          variableWidth: true,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });


  $('.slick-usefullreviews').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    infinite: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 992,
        settings: {
          variableWidth: true,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 480,
        settings: {
          variableWidth: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true
        }
      }
    ]
  });

  //сворачиваемые/разворачиваемы списки с заданным кол-вом
  //отображаемых элементов для десктопа и мобильного
  function hideListItems(el,desktopCount,mobileCount,toggler) {
    if(matchMedia) {
      var screen768 = window.matchMedia('(max-width:768px)');
      screen768.addListener(changes768);
      changes768(screen768);
    }

    function changes768(screen768) {
      if(screen768.matches) {
        $(el).removeClass('more-than-count hidden');

        $(el).each(function(key,item){
          if (key >= mobileCount) {
            $(item).addClass('more-than-count hidden');
          }
        });
      } else {
        $(el).removeClass('more-than-count hidden');

        $(el).each(function(key,item){
          if (key >= desktopCount) {
            $(item).addClass('more-than-count hidden');
          }
        })
      }
    }

    $(document).on('click',toggler,function(e){
      e.preventDefault();
      $(el+'.more-than-count').toggleClass('hidden');
    });
  }

  hideListItems('.manufacter-item',15,6,'.manufacers-list-toggler');

  $('.slick-additional').slick({
    infinite: false,
    slidesToShow:5,
    slidesToScroll:5,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow:4,
          slidesToScroll:4
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow:3,
          slidesToScroll:3
        }
      }, {
        breakpoint: 576,
        settings: {
          slidesToShow:2,
          slidesToScroll:2
        }
      }
    ]
  });

  $('.header__menu-links li').each(function(key,item){
    if($(item).find('ul').length) {
      $(item).addClass('childs-in');
    }
  });

  $('.slick-producers').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    infinite: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      }, {
        breakpoint: 576,
        settings: {
          variableWidth: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      }
    ]
  });

  $('.slick-clients').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },{
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 576,
        settings: {
          variableWidth: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      }
    ]
  });


  $('.slick-homevideos').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          // arrows: true
        }
      }, {
        breakpoint: 576,
        settings: {
          variableWidth: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true
        }
      }
    ]
  })

  $('.mobile-catalog-link.all').on('click',function(e){
    e.preventDefault();
    $('.header__mobile-mtoggler').click();
  });

  //вешаем слик, создаем превьюшки, связываем карусель с превьюшками
  if ($('.slick-card-slide').length > 1) {
    $('.card__imgs').addClass('padding').append('<div class="card__imgs-previews"></div>');

    $('.slick-card-slide').each(function(key,item){
      let link = $(item).find('a').clone();
      link.attr('href','javascript:void(0)');
      link.addClass('card__imgs-preview');
      if (key === 0) {
        link.addClass('active');
      }
      $('.card__imgs-previews').append(link);
    });

    const slickCard = $('.slick-card');
    slickCard.slick({
      infinite: false,
      slidesToShow: 1
    });

    $(document).on('click','.card__imgs-preview',function(e){
      e.preventDefault();
      const index = $(this).index();
      $('.card__imgs-preview').removeClass('active')
      $(this).addClass('active');
      slickCard.slick('slickGoTo',index);
    })

    slickCard.on('afterChange',function(slick,currentSlide){
      const index = currentSlide.currentSlide;
      $('.card__imgs-preview').removeClass('active');
      $('.card__imgs-preview').eq(index).addClass('active');
    });
  }//if end
  

  $('.uploader').each(function(key,item){
    $(item).attr('data-index',key+1);
  })


  //добавляем файлы во временное хранилище + предпросмотр
  $(document).on('change','.uploader-photos input',function(e){
    filesToStore(this,e,'.uploader-files-preview');
  });

  //удаляем файлы из временного храилища
  $(document).on('click','.file-preview-remove',function(e){
    e.preventDefault();
    let storeIndex = $(this).data('store');
    let fileIndex = $(this).parent().index();
    removeFileFromStore(fileIndex,storeIndex);
    $(this).parent().remove();
  });

  //предпросмотр загружаемых видео
  $(document).on("change", ".uploader-video input", function(evt) {
    var $source = $('#preview_video');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
    $source.closest('.uploader-video-preview').addClass('load');
  });


  //стоимость/кол-во товаров
  $(document).on('click','.ui-price-plus',function(e){
    let parent = $(this).closest('.ui-price');
    let step = +parent.attr('data-step') || 1;
    let price = +parent.attr('data-price');
    let current = parseInt((parent.find('input.ui-price-input').val() || 1),10);
    const input = parent.find('input.ui-price-input');
    const totalEl = parent.find('.ui-price-total');
    const pack = parent.attr('data-pack') || '';
    const packEl = parent.find('.ui-price-total-pack');

    const isCard = (parent.closest('.card__right').length) ? true : false;
    const panelTotalEl = $('.spy-new .ui-price-total');
    const panelPackEl = $('.spy-new .ui-price-total-pack');

    let newValue = current + step;
    let total = (price * newValue).toFixed(2);
  
    //форматируем цену
    let totalParts = total.split('.');
    if (totalParts[1] === '00') {
      total = parseInt(total,10)
    }
    
    totalEl.text(total);
    input.val(newValue);

    //если это карточка товара - меняем и цены в нижней панели
    if (isCard) { panelTotalEl.text(total) }

    if (pack === 'yes') {
      packEl.text((newValue/step)+' ');

      if (isCard) { panelPackEl.text((newValue/step)+' ') }
    }
  });
  $(document).on('click','.ui-price-minus',function(e){
    let parent = $(this).closest('.ui-price');
    let step = +parent.attr('data-step') || 1;
    let price = +parent.attr('data-price');
    let current = parseInt((parent.find('input.ui-price-input').val() || 1),10);
    const input = parent.find('input.ui-price-input');
    const totalEl = parent.find('.ui-price-total');
    const pack = parent.attr('data-pack') || '';
    const packEl = parent.find('.ui-price-total-pack');
    
    const isCard = (parent.closest('.card__right').length) ? true : false;
    const panelTotalEl = $('.spy-new .ui-price-total');
    const panelPackEl = $('.spy-new .ui-price-total-pack');

    let newValue = current - step;
    if(newValue < 1) {return false;}
    let total = (price * newValue).toFixed(2);
    
    //форматируем цену
    let totalParts = total.split('.');
    if (totalParts[1] === '00') {
      total = parseInt(total,10)
    }
    
    totalEl.text(total);
    input.val(newValue);

    //если это карточка товара - меняем и цены в нижней панели
    if (isCard) { panelTotalEl.text(total) }

    if (pack === 'yes') {
      packEl.text((newValue/step)+' ');

      if (isCard) { panelPackEl.text((newValue/step)+' ') }
    }
  });

  //инициализируем magnificPopup для попап окон
  function magnificPopupInit() {
    $('.mfp-video').magnificPopup({
      type: 'iframe',
      mainClass: 'magnific-video',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
    $(document).on('click','.ajax-mfp',function(){
      var a = $(this);
      $.magnificPopup.open({
        items: { src: a.attr('data-href') },
        type: 'ajax',    
        overflowY: 'scroll',
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        ajax: {
          tError: 'Ошибка. <a href="%url%">Контент</a> не может быть загружен',
        },
        callbacks: {
          open: function () {
            setTimeout(function(){
              $('.mfp-wrap').addClass('not_delay');
              $('.white-popup').addClass('not_delay');
            },700);
          }
        }
      });
      return false;
    });
  }

  //инициализируем lightgallery
  function lightgalleryInit() {
    $('.popup-gallery').each(function(key,item){
      $(item).attr('id','popup-gallery-'+(key+1));
  
      $('#popup-gallery-'+(key+1)).lightGallery({
        thumbnail:true,
        thumbWidth: 120,
        thumbMargin: 15,
        currentPagerPosition: 'middle',
        selector: 'a',
        enableDrag: false,
        download: false,
        share: false,
        getCaptionFromTitleOrAlt:false,
        hash: false
      });
    });
  }

  //лениво "тянем" и инициализируем магнифик
  if ($('.ajax-mfp').length || $('.mfp-video').length) {
    lazyLibraryLoad(
      'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',
      magnificPopupInit
    );
  }

  //лениво "тянем" и инициализируем lightgallery
  if ($('.popup-gallery').length) {
    lazyLibraryLoad(
      'https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery-all.min.js',
      'https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lightgallery.min.css',
      lightgalleryInit
    );
  }

  $(document).on('click','a.scrollToHash',function(e){
    var hash = $(this).attr('href');
    if($(hash).length) {
      e.preventDefault();
      let offset = $(hash).offset().top;
      $('html,body').animate({
        scrollTop:offset-40
      },300);
    }
  });


  //скрываем выпадающие рассрочки по клику вне
  $(document).on('mouseup',function(e){
    if ($('.card__right-sales').has(e.target).length === 0){
      $('.card__sale-installment').removeClass('opened');
      $('.card__sale-installment-drop').removeClass('opened');
    }
  });

});


//глобавльное временное хранилище файлов
const TempStore = {}

/*если надо послать файлы на сервер, формируем FormData с файлами*/
/*const formData = getFilesFormData(Store.files);*/
function getFilesFormData(files) {
  const formData = new FormData();
  files.map((file, index) => {
      formData.append(`file${index + 1}`, file);
  });
  return formData;
}

/*добавляем файлы в общую кучу*/
// function addFiles(files) {
//   TempStore.files = TempStore.files.concat(files);
// }
function addFilesToStore(files,id) {
  if ($('.uploader-photos').length > 1) {
    let $name = 'files'+id;
    if (typeof TempStore[$name] === 'undefined') {
      TempStore[$name] = [];
    }
    TempStore[$name] = TempStore[$name].concat(files);
  } else {
    TempStore.files = [];
    TempStore.files = TempStore.files.concat(files);
  }
}

/*удаляем файл из хранилища*/
function removeFileFromStore(index,id) {
  //TempStore.files.splice(index, 1);
  if ($('.uploader').length > 1) {
    let $name = 'files'+id;
    TempStore[$name].splice(index, 1);
  } else {
    TempStore.files.splice(index, 1);
  }
}

function filesToStore(input, e, previews) {
  var id = $(input).parent('.uploader').attr('data-index');
  // если не выбрали файл и нажали отмену, то ничего не делать
  if (!e.target.files.length) {
    return;
  }
  // создаем новый массив с нашими файлами
  const files = $.map(Object.keys(e.target.files), function(i) {
    //console.log(e.target.files[i].name);
    return e.target.files[i];
  });
  filesStorePreview(e, input, files, id, previews);
  addFilesToStore(files, id); //добавляем файлы в хранилище

  // очищаем input, т.к. файл мы сохранили
   e.target.value = '';
}

function filesStorePreview (e,input,files,id,previews) {
  let block = $(previews);

  for (let i = 0; i < files.length; i++) {
    var reader = new FileReader();

    reader.onload = function(e) {
      let span = document.createElement('span');
      let image = document.createElement('img');
      let icon = document.createElement('i');
      span.setAttribute('class','file-preview');
      // span.innerHTML = '<span>'+files[i].name+'</span>';
      image.setAttribute('src',e.target.result);
      icon.setAttribute('class','file-preview-remove');
      icon.setAttribute('data-store',id);
      span.appendChild(icon);
      span.appendChild(image);

      block.append(span);
    }
    
    reader.readAsDataURL(files[i]);
  }//for
}

