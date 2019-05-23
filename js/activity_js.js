$(document).ready(function() {



$('#downloadview').hover(function(){
    $(this).css("visibility","visible");
});




$(".readMorelink").click(function(){

$('.step-by-step-full').css("display","block");
  $(".step-by-step-full").css("visibility", "visible");


$('.step-by-step-excerpt').css("display","none");
  $(".step-by-step-excerpt").css("visibility", "hidden");

$('.step-by-step-close').css("display","block");
  $(".step-by-step-close").css("visibility", "visible");




  });


$(".closeMorelink").click(function(){

$('.step-by-step-full').css("display","none");
  $(".step-by-step-full").css("visibility", "none");


$('.step-by-step-excerpt').css("display","block");
  $(".step-by-step-excerpt").css("visibility", "visible");


$('.step-by-step-close').css("display","none");
  $(".step-by-step-close").css("visibility", "hidden");


  });




  });
