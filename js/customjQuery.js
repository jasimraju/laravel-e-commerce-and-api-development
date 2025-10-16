$( document ).ready(function() {
	
    changeShopingtotal('#shoping-count-item','#shoping-total');
    changewishlist('#wishlist-count-item');


   
   
   
   
      $('.single-gallery-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.pro-page-slider'
	});
	
	$('.pro-page-slider').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.single-gallery-slider',
	  dots: true,
	  centerMode: true,
	  focusOnSelect: true,
	     prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
         nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
	});


	calltoggle();
	if ($('#appendajaxview').length) {
		var element = '#appendajaxview';
		var total_page = parseInt($(element).attr('data-total-page'));
		var load_page = parseInt($(element).attr('data-loaded-page'));

	 $(window).scroll(80,function(){
          var height  = $(document).height() - $(window).height()-80;
          var top = $(this).scrollTop();
            var partage = convert_par(height,top);
            //console.log(partage);
           if (partage > 70 && total_page >= load_page ) { 
             /*tigger ajax*/
             
             load_page  = load_page+1;
         
             $(element).attr("data-loaded-page", load_page);
             appendview(element);
       
              }
          }); 
	 }

	

	 $('#js-select2-multi').on('change.select2', function (e) {
  // Do something
   var data = e.params.data;
    console.log(data);
  console.log('hellosdfsfsf');
});
	
});

function calltoggle(){

          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)});

}

function showslick(){
	   $('.deal-slider').not('.slick-initialized').slick({
        dots: false,
        arrows:true,
        infinite: true,
         slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-left arrow-left"></i>',
         nextArrow: '<i class="fas fa-chevron-right arrow-right"></i>',
     });
}

function convert_par(total,amount){
	var result = (amount*100)/total;
	return result;

}
