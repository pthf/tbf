$(document).on('ready', function(){
$('.suboptions_li').slideUp(0, function(){
});

  $('.principal_text').click(function () {
   $(this).siblings('ul.suboptions_li').slideToggle(250, function(){
   });
});

});
