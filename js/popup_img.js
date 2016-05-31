$(document).on("ready",function(){

  //$(".image_profile,.image_logo").on("click", function(){
  $(".image_profile,.image_logo").on("click", function(){
    $(".popup_img").css({
      "opacity" : "1",
      "z-index" : "10",
    });
  });

  $(".popup_img").on("click", function(){
    $(".popup_img").css({
      "opacity" : "0",
      "z-index" : "-10"
    });
  });

});
