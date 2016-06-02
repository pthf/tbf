var HomeSliderCounter = $('.beers_month li.top-slider').length;
var HomeMinSlider = HomeSliderCounter - HomeSliderCounter + 1;
$(document).ready(function() {
  var Home$visibleSlide, HomegetDataSlide, HomesliderInterval, HomegetDataNextSlide, HomegetDataPrevSlide, HomegetDataNavDot;
  var HomefadeDuration = 600;
  var Homepause = 4200;

  //show first slide
  $('.beers_month li:first-child').css('display','block');

  //show first nav dot
  $('.nav_beers li:first-child').addClass('active-cd');

  //find out what slide is visible and get its data attribute
  function HomegetSlideInfo() {
   Home$visibleSlide = $('.beers_month').find('li:visible');
   HomegetDataSlide = Home$visibleSlide.data('n');
   HomegetDataNextSlide = Home$visibleSlide.next().data('n');
   HomegetDataPrevSlide = Home$visibleSlide.prev().data('n');
  }

  //show next slide
  function HomeshowNextSlide() {
   HomegetSlideInfo();

   $('.nav_beers li').removeClass('active-cd');

   if (HomegetDataSlide < HomeSliderCounter) {
      Home$visibleSlide.fadeOut(HomefadeDuration);
      Home$visibleSlide.next().fadeIn(HomefadeDuration);
      $('.nav_beers li[data-cd='+HomegetDataNextSlide+']').addClass('active-cd');
   }
   else {
      Home$visibleSlide.fadeOut(HomefadeDuration);
      $('.beers_month li:first-child').fadeIn(HomefadeDuration);
     $('.nav_beers li:first-child').addClass('active-cd');
   }
  } //end showNextSlide

  function HomeshowPrevSlide() {
    HomegetSlideInfo();

     $('.nav_beers li').removeClass('active-cd');

   if (HomegetDataSlide > minSlider ) {
      Home$visibleSlide.fadeOut(HomefadeDuration);
      Home$visibleSlide.prev().fadeIn(HomefadeDuration);
      $('.nav_beers li[data-cd='+HomegetDataPrevSlide+']').addClass('active-cd');
   }
   else {
      Home$visibleSlide.fadeOut(HomefadeDuration);
      $('.beers_month li:last-child').fadeIn(HomefadeDuration);
      $('.nav_beers li:last-child').addClass('active-cd');
   }

  }// end showPrevSlide


  // // controls
  // $('.next').on('click', showNextSlide);
  // $('.prev').on('click', showPrevSlide);


  // //autoplay
  function HomestartSlider() {
   HomesliderInterval = setInterval( showNextSlide, Homepause)
  }
  HomestartSlider();
  //  $('.slideshow').mouseenter(function() {
  //     clearInterval(HomesliderInterval);
  //  });
  //   $('.slideshow').mouseleave(startSlider);


  //control dots clicks
  $('.nav_beers li').on('click', function() {
    HomegetDataNavDot = $(this).data('cd');
    getSlideInfo();

    $('.nav_beers li').removeClass('active-cd');
    $(this).addClass('active-cd');

    Home$visibleSlide.fadeOut(HomefadeDuration);
    $('.beers_month li[data-n='+HomegetDataNavDot+']').fadeIn(HomefadeDuration);
    });//end dots click

}); //end ready
