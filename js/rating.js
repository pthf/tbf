$(document).ready(function(){

  /* 1. Click en90 estella hover */
  $(document).on('mouseover', '#stars li', function(){
    var onStar = parseInt($(this).data('value'), 10); // Hover en una estrella

    // Resaltar estrellas que estan antes de la seleccionada
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Selecciona estrella con un click*/
  $(document).on('click', '#stars li', function(){
    var onStar = parseInt($(this).data('value'), 10); // Estrella actualmente seleccionada
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
  });

});
