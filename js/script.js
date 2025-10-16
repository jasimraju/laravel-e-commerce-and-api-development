$(document).ready(function(){

    "use strict";
     
   /*==============================================================
   //Topbar Slider
   ==============================================================*/
if(document.getElementById('deals-data')){
    $('.weektime').each(function(){
      var time = $(this).text();

      var id = $(this).attr('data-id');
      var deadline = new Date(time).getTime();  
              
    var x = setInterval(function() {
       var currentTime = new Date().getTime();                
       var t = deadline - currentTime; 
       var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
       var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
       var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
       var seconds = Math.floor((t % (1000 * 60)) / 1000); 
       
           document.getElementById("days-"+id).innerHTML = days ; 
           document.getElementById("hours-"+id).innerHTML =hours; 
           document.getElementById("minutes-"+id).innerHTML = minutes; 
           document.getElementById("seconds-"+id).innerHTML =seconds; 
           if (t < 0) {
              clearInterval(x); 
           //   document.getElementById("time-up-"+id).innerHTML = "TIME UP"; 
              document.getElementById("days-"+id).innerHTML ='0'; 
              document.getElementById("hours-"+id).innerHTML ='0'; 
              document.getElementById("minutes-"+id).innerHTML ='0' ; 
              document.getElementById("seconds-"+id).innerHTML = '0'; 
           } 
    }, 1000); 
    });
    /*===================== Scroll to add Header Class=====================*/

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".header-area").addClass("header_fixed");
    } else {
        $(".header-area").removeClass("header_fixed");
    }
});

   
    
}
var arrows_left = $('#arrow-sider').attr('data-image-left');
var arrows_right = $('#arrow-sider').attr('data-image-right');
    $('.topbar-slider-inner').not('.slick-initialized').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<img src="'+arrows_right+'" alt="Arrow Right" class="prev-arrow">',
         nextArrow: '<img src="'+arrows_left+'" alt="Arrow Left" class="next-arrow">',
     });
            
    
    /*==============================================================
   //Shop By Cat Slider
   ==============================================================*/
 
    $('.shop-by-cat-slider').not('.slick-initialized').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 6,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
         nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
     });
       
       // Category Folter Dropdown active Class   
$("#myTab .nav-item .arrow-down").click(function(){
  $('.tab-section-inner').addClass('active');
});


   /*==============================================================
   //Deal Of the Day SLider
   ==============================================================*/
   
    $('.deal-slider').not('.slick-initialized').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
         nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
     });
          


     /*============= Header Product Categoryt Dropdown===============*/
     // In your Javascript (external .js resource or <script> tag)
     $('#product_cat_list').select2();


 /*==============================================================
// deal countdown js
==============================================================*/
  /*call all flash product*/
  $('#all_flash_product').trigger('click');


   });
   
 