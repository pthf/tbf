var sliderCounter = $('.beers_month li.news-slider').length;
var minSlider = sliderCounter - sliderCounter + 1;
$(document).ready(function() {
  var $visibleSlide, getDataSlide, sliderInterval, getDataNextSlide, getDataPrevSlide, getDataNavDot;
  var fadeDuration = 600;
  var pause = 4300;

  //show first slide
  $('.beers_month li:first-child').css('display','block');

  //show first nav dot
  $('.nav_beers li:first-child').addClass('active-cd');

  //find out what slide is visible and get its data attribute
  function getSlideInfo() {
   $visibleSlide = $('.beers_month').find('li:visible');
   getDataSlide = $visibleSlide.data('n');
   getDataNextSlide = $visibleSlide.next().data('n');
   getDataPrevSlide = $visibleSlide.prev().data('n');
  }

  //show next slide
  function showNextSlide() {
   getSlideInfo();

   $('.nav_beers li').removeClass('active-cd');

   if (getDataSlide < sliderCounter) {
      $visibleSlide.fadeOut(fadeDuration);
      $visibleSlide.next().fadeIn(fadeDuration);
      $('.nav_beers li[data-cd='+getDataNextSlide+']').addClass('active-cd');
   }
   else {
      $visibleSlide.fadeOut(fadeDuration);
      $('.beers_month li:first-child').fadeIn(fadeDuration);
     $('.nav_beers li:first-child').addClass('active-cd');
   }
  } //end showNextSlide

  function showPrevSlide() {
    getSlideInfo();

     $('.nav_beers li').removeClass('active-cd');

   if (getDataSlide > minSlider ) {
      $visibleSlide.fadeOut(fadeDuration);
      $visibleSlide.prev().fadeIn(fadeDuration);
      $('.nav_beers li[data-cd='+getDataPrevSlide+']').addClass('active-cd');
   }
   else {
      $visibleSlide.fadeOut(fadeDuration);
      $('.beers_month li:last-child').fadeIn(fadeDuration);
      $('.nav_beers li:last-child').addClass('active-cd');
   }

  }// end showPrevSlide


  // // controls
  // $('.next').on('click', showNextSlide);
  // $('.prev').on('click', showPrevSlide);


  // //autoplay
  function startSlider() {
   sliderInterval = setInterval( showNextSlide, pause)
  }
  startSlider();
  //  $('.slideshow').mouseenter(function() {
  //     clearInterval(sliderInterval);
  //  });
  //   $('.slideshow').mouseleave(startSlider);


  //control dots clicks
  $('.nav_beers li').on('click', function() {
    getDataNavDot = $(this).data('cd');
    getSlideInfo();

    $('.nav_beers li').removeClass('active-cd');
    $(this).addClass('active-cd');

    $visibleSlide.fadeOut(fadeDuration);
    $('.beers_month li[data-n='+getDataNavDot+']').fadeIn(fadeDuration);
    });//end dots click

}); //end ready
