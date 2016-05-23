$(document).ready(function(){
  $("a#show-img").click(function(){
    $("#lightbox, #lightbox-panel").fadeIn(300);
  });
    $("a#close-panel,#lightbox-panel").click(function(){
    $("#lightbox, #lightbox-panel").fadeOut(300);
  })
});
