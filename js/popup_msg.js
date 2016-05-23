$(document).ready(function(){
  $("a#show-msn").click(function(){
    $("#lightbox-msn, #lightbox-panel-msn").fadeIn(300);
  });
    $("a#close-panel-msn").click(function(){
    $("#lightbox-msn, #lightbox-panel-msn").fadeOut(300);
  })
});
