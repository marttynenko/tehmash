function showHolidaysPopup(){
  $.get('popup-holidays.html')//изменить путь к файлу попапа, если нужно
  .done(function(data){
    $('html').addClass('popup-opened');
    $('body').append(data);
  })
}

document.addEventListener('DOMCOntentLoaded',function(){

  if (!sessionStorage.getItem('holidayPopup') || sessionStorage.getItem('holidayPopup') === true) {
    showHolidaysPopup();
  }

  $(document).on('click','.popup-custom-close',function(e){
    e.preventDefault();
    $('.popup-custom-overlay').remove();
    $('html').removeClass('popup-opened');
  });

  $(document).on('click','.popup-custom-btn',function(e){
    e.preventDefault();
    $('.popup-custom-overlay').remove();
    $('html').removeClass('popup-opened');
    sessionStorage.setItem('holidayPopup',false)
  });

});
