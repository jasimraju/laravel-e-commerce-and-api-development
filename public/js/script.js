$(document).ready(function(){

    "use strict";
     
   /*==============================================================
   //Topbar Slider
   ==============================================================*/
   if(document.getElementById('days')){
    //alert('sf');
    var deadline = new Date("july 30, 2022 15:37:25").getTime();             
    var x = setInterval(function() {
       var currentTime = new Date().getTime();                
       var t = deadline - currentTime; 
       var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
       var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
       var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
       var seconds = Math.floor((t % (1000 * 60)) / 1000); 
       
           document.getElementById("days").innerHTML = days ; 
           document.getElementById("hours").innerHTML =hours; 
           document.getElementById("minutes").innerHTML = minutes; 
           document.getElementById("seconds").innerHTML =seconds; 
           if (t < 0) {
              clearInterval(x); 
              document.getElementById("time-up").innerHTML = "TIME UP"; 
              document.getElementById("days").innerHTML ='0'; 
              document.getElementById("hours").innerHTML ='0'; 
              document.getElementById("minutes").innerHTML ='0' ; 
              document.getElementById("seconds").innerHTML = '0'; 
           } 
    }, 1000); 
}
    $('.topbar-slider-inner').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<img src="images/icons/arrow-right.png" alt="Arrow Right" class="prev-arrow">',
         nextArrow: '<img src="images/icons/arrow-left.png" alt="Arrow Left" class="next-arrow">',
     });
            
    
    /*==============================================================
   //Shop By Cat Slider
   ==============================================================*/
   
    $('.shop-by-cat-slider').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 6,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
         nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
     });
          



   /*==============================================================
   //Deal Of the Day SLider
   ==============================================================*/
   
    $('.deal-slider').slick({
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
  

if(document.getElementById('days')){
    //alert('sf');
    var deadline = new Date("july 30, 2022 15:37:25").getTime();             
    var x = setInterval(function() {
       var currentTime = new Date().getTime();                
       var t = deadline - currentTime; 
       var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
       var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
       var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
       var seconds = Math.floor((t % (1000 * 60)) / 1000); 
       
           document.getElementById("days").innerHTML = days ; 
           document.getElementById("hours").innerHTML =hours; 
           document.getElementById("minutes").innerHTML = minutes; 
           document.getElementById("seconds").innerHTML =seconds; 
           if (t < 0) {
              clearInterval(x); 
              document.getElementById("time-up").innerHTML = "TIME UP"; 
              document.getElementById("days").innerHTML ='0'; 
              document.getElementById("hours").innerHTML ='0'; 
              document.getElementById("minutes").innerHTML ='0' ; 
              document.getElementById("seconds").innerHTML = '0'; 
           } 
    }, 1000); 
}
   });
   
 