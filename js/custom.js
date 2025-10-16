
        "use strict";


          var dyn_functions = []; 
          dyn_functions['catgoryintial'] = function(){
   
//colorpicker start
setTimeout(function(){
  
  $("#parent-bg_color").spectrum();
}, 1000);
    

  };    
  dyn_functions['select2_config'] = function(){

    setTimeout(function(){
      $(".select2-multiple").select2();
    },1000);
  }; 

  dyn_functions['touchspin_config'] = function(){
    

    setTimeout(function(){
        var defaultOptions = {
    };
       $('[data-toggle="touchspin"]').each(function (idx, obj) {
      var objOptions = $.extend({}, defaultOptions, $(obj).data());
      $(obj).TouchSpin(objOptions);
    });
    },1000);
  };

  dyn_functions['config_date_range'] = function(){
     setTimeout(function(){
      
      $('input[name="start_end_date"]').daterangepicker({
    timePicker: true,
   
    locale: {
      format: 'DD/M/YY hh:mm A'
    }
  });
    },1000);
  }
  dyn_functions['datatable_config'] = function(){   
//colorpicker start
setTimeout(function(){

          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
     var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        bSort : false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
}, 1000);
};
  dyn_functions['datatable_customer'] = function(){   
//colorpicker start
setTimeout(function(){
  
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

     var table = $('#datatable-customer').DataTable({
        lengthChange: false,
        bSort : false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-customer_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
}, 1000);
    

  };
    dyn_functions['datatable_config_scroll'] = function(){
   
//colorpicker start
setTimeout(function(){
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
  
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        scrollX: true,
        bSort : false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
}, 1000);
    

  };
  dyn_functions['addactiveclass'] = function(classname,url,activeclass='active'){
    $('.'+classname).each(function(){
      var url_active = $(this).attr('data-url');
      if(url_active == url){
        $(this).addClass(activeclass);
      }
      else{
        $(this).removeClass(activeclass);
      }
    });
  }

  dyn_functions['iconpicker'] = function(classname){
setTimeout(function(){
  console.log('helloasda');
  
                   $('#iconpicker').iconpicker({
                arrowClass: 'btn-base',
                cols: 8,
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                footer: true,
                header: true,
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-base',
                unselectedClass: ''
                });

                $("#iconpicker").find('input[type="hidden"]').attr("name",'icon').attr("id",'parent-icon');

               $('#iconpicker').on('click', function(e) {
                var value = $('input[name="icon"]').val();
                  
                  
              });
},1000);
  }

  dyn_functions['afterajax_login'] = function(element,next=1,e_id=''){
    
    $(element).attr("onclick", 'formsubmit(this)');
    var data_url = $(element).attr('data-url-exta');
    var data_modal = $(element).attr('data-modal');
     $(data_modal).modal('hide');
    $(element).attr('data-url',data_url);
    if(next !== 1){
      console.log('test');
      console.log(e_id);
      getAjaxView(next,null,e_id,false,'get');
    }
  }

    dyn_functions['urlredirect'] = function(element){
   
    window.location.replace(element);
  }


    	function showview(element,url_option = 'no',viewshow='yes',url_exta= 'no'){
		  var data ='';
      var url = '';
      
      if(viewshow == 'yes'){ 

        url = $(element).attr('data-url');
         
          if($(element).attr('data-product-details')){
      
            var id_details = $(element).attr('data-product-details');
            var de_qty = $('#'+id_details).val();
            url = url+'/'+de_qty;
            $('#'+id_details).val(1);
          }
          if(url_exta != 'no'  ){
            url  = url+'/'+url_exta;
          }

      dyn_functions['addactiveclass']('sub-left-menu',url);

      var viewid = $(element).attr('data-viewport');
      console.log(viewid);
    }
    else{
      var viewid = viewshow;
    }
 
      getAjaxView(url,data=null,viewid,false,'get');

      if(url_option != 'no'){
        console.log(url_option);
        var  url_active = $(element).attr('data-active-url');
        dyn_functions['addactiveclass']('sub-left-menu',url_active);
      }
    /*after success call back function*/
    if($(element).attr('data-callback')) {
        var callback  = $(element).attr('data-callback');
        if($(element).attr('data-callback-length')){
          /*call multiple re assign*/
          var number_reassign = parseInt($(element).attr('data-callback-length'));
          for (var i = 1; i < number_reassign+1 ; i++) {
            var multiple_call = $(element).attr('data-callback-'+i);
          dyn_functions[multiple_call]();
            }
        }
        
        dyn_functions[callback]();
      
    }

  if($(element).attr('data-shoping-cart')){
    var data_shoping_class = $(element).attr('data-shoping-class');
    $(element).addClass(data_shoping_class);
    var data_shoping_item  = $(element).attr('data-shoping-cart');
    var data_shoping_cart_total  = $(element).attr('data-shoping-cart-total');
    var sw_text= $(element).attr('data-alert-text');
    var sw_title = "Add successfully";
    var sw_status = $(element).attr('data-alert-type');
    var sw_timer = parseInt($(element).attr('data-alert-timer'));
    if($(element).attr('data-deal-two')){
      var data_deal_id_1 = $(element).attr('data-deal-id-1');
      var data_deal_id_2 = $(element).attr('data-deal-id-2');

      $(data_deal_id_1).addClass(data_shoping_class);
      $(data_deal_id_2).addClass(data_shoping_class);
    }
    if($(element).attr('data-deal-id')){
      var data_deal_id = $(element).attr('data-deal-id');
      console.log(data_deal_id);
      $(data_deal_id).addClass(data_shoping_class);
    }
    showSweetalart(sw_title,sw_text,sw_status,sw_timer);
    if($(element).attr('data-shoping-cart-total')){

     setTimeout(function() {changeShopingtotal(data_shoping_item,data_shoping_cart_total)},2000);
    }
    else{
   
      setTimeout(function() {changewishlist(data_shoping_item)},2000);
    }
  }
	}


  function viewcallback(url){
     var data ='';
    var viewid = 'main-container';
    getAjaxView(url,data=null,viewid,false,'get');
    $('[data-url="'+url+'"]').addClass('active');
  }

function viewback(element){
     var data ='';
     var url = $(element).attr('data-url');
    var viewid = 'main-container';
    getAjaxView(url,data=null,viewid,false,'get');
    $('[data-url="'+url+'"]').addClass('active');
  }
  
	function showmodal(element,exta=false){
  
		var ajaxclass = $(element).attr('data-ajaxid');

		var url = $(element).attr('data-url');
    if(exta){
      url = url+'/'+exta;
    }
		var modalclass = $(element).attr('data-modal');
          getAjaxModal(url,{},ajaxclass,false,{},modalclass);
          console.log(ajaxclass);
  
	}

  function formsubmit(element,is_modal=false){

     $('body').addClass("loading");
    var btnid = $(element).attr('id');
    var form = $('#'+btnid+'-form');
    var url = form.attr('action');
    console.log(btnid);
    $(".form-group").each(function() {
          $(this).removeClass('has-error');
          $('.help-block').text('');
           });
      var successcallback = function(a){
       
            showoverlayremove('overfull','is-open');          
           if(a.confirm == 1){
          if(typeof a.data_call_url !== 'undefined'){

            if(typeof a.data_call_url !== 'undefined'){
               swal(a.status, a.msg, "success");
               if(typeof a.data_next_url !== 'undefined'){
                console.log('you');
                setTimeout(function(){ dyn_functions[a.data_call_url](a.element_id,a.data_next_url,a.view_id); },2000);
               }
               else{
                setTimeout(function(){ dyn_functions[a.data_call_url](a.element_id); },2000);
               }
             
           
            }
            else{
            dyn_functions[a.data_call_url](a.element_id);
            swal(a.status, a.msg, "success");
          }
          }
             else{
            swal(a.status, a.msg, "success");
          }
           }
           else{
            showtoster(a.heading,a.msg,a.status)
           }
          
            if (typeof a.timeout !== 'undefined') {
              var time = a.timeout;
             }
             else{
              var time = 1000;
             }
            if(is_modal){
              $('.modal').modal('hide');
            }
            if(a.is_pagereload == 'yes'){
               if($(element).attr('data-replace')) {
        var callback  = $(element).attr('data-replace');
        window.location.replace(callback+'/'+'Registration successfully');
        
      
    }
    else{
              setTimeout(function(){ location.reload(); },time);
            }
            }
            if(a.is_callback == 'yes'){
             
              if(a.callbacktype == 'view'){
                viewcallback(a.route);
              }
              else{
              aftercall_method(a.peramter);
            }
            }
          
        }
      var errorCallback = function(a){
        showoverlayremove('overfull','is-open');
        $('.form-label').each(function(){
          $(this).removeClass('text-danger');
                  });
           $('.form-select').each(function(){
          $(this).removeClass('is-invalid');
                  });
           $('.form-control').each(function(){
          $(this).removeClass('is-invalid');
                  });
          $('.error').each(function(){
          $(this).addClass('d-none');
                  });
              $.each(a, function (key, value) {
                   $('#label-'+key).addClass('text-danger');
                   $('#parent-'+key).addClass('is-invalid');
                   $('#error-'+key).addClass('invalid-feedback');
                   $('#error-'+key).removeClass('d-none');
                   $('#error-'+key).text(value);
                   
                });
        }
    showoverlay('overfull','is-open');
    ajaxValidationFormSubmit(form.attr('action'),form.serialize(),'',successcallback,errorCallback); 

  }

  function formfilter(element,viewshow ='yes'){
    var btnid = $(element).attr('id');
    var form = $('#'+btnid+'-form');
    var url = form.attr('action');
       if(viewshow == 'yes'){ 
              var viewid = 'main-container';
    }
    else{
      var viewid = viewshow;
    }
  
        getAjaxView(url,form.serialize(),viewid,false,'post');

   
  }

  function showtoster(head,msg,type){
 setTimeout(function(){
    $.toast({
      heading: head,
      text: msg,
      position: 'top-right',
      loaderBg:'#f0c541',
      icon: type,
      hideAfter: 3500, 
      stack: 6
    });
  }, 500);
  }
  
  function showimage(element){

    var validImage = ['image/gif','image/jpeg','image/png'];
          var file = element.files[0];
             var fietype = file['type'];
             var id = $(element).attr('id');
             var message = $(element).attr('data-message');
              var showimage = $('#'+id+'-show');
              if($.inArray(fietype,validImage) < 0){
              showtoster('danger','Invalid file format','error');
              }
            else{
             console.log('shomimage');
            var reader = new FileReader();
             if($(element).attr('data-multiple')) {
             var lengthconut =  showimage.find( ".col-lg-4" ).length;
             console.log(lengthconut);
              reader.onload = function (e){
                var html = '<div class="col-lg-2 py-2"><div><img src="'+e.target.result+'" id="category-image-input-img-'+lengthconut+'" alt="" class="rounded avatar-md" ><input type="hidden" name="category_image[]" value="'+e.target.result+'" id="category-image-input-value-'+lengthconut+'"></div></div>';
                showimage.append(html);
              }
            console.log($(element).attr('data-multiple'));
            }
            else{
   console.log(id);
            reader.onload = function (e) 
            {
             
               $('#'+id+'-img').attr('src', e.target.result);
                $('#'+id+'-value').val(e.target.result);
                $('#'+id+'-img').removeClass('d-none');
            }  
          }
            reader.readAsDataURL(file);
              }
  }

  function read_URL(input,i,successcallback=false) 
   {
    if (input.files && input.files[0]) 
        {
            var id = input.id;
            var reader = new FileReader();
            reader.onload = function (e) 
            {
              if(successcallback){
                successcallback(e.target.result);
              }
               $('#'+id+'-img').attr('src', e.target.result);
                $('#'+id+'-value').val(e.target.result);
            }  
            reader.readAsDataURL(input.files[0]);
          
        }
    } 

    function delete_data(element){
      
      var url= $(element).attr('data-url');
 
    
        var confirmCallback=function(){
          var requestCallback=function(response){
            if(response.status == 'success') {
                viewcallback(response.route);
                //location.reload();  
                }
            }
   
            ajaxGetRequest(url,requestCallback);

        }
        confirmAlert(confirmCallback);
    }

    function termina_request(element){
       var url= $(element).attr('data-url');
      var title = 'Are you sure?';
      var content = 'Termination request are proced by admin';
      var successmessage = 'Request taken successfully';
      var errormessage = 'Your request not taken';
      var confirmText = 'Yes I do it';
      var successalter ="Termination Request";
      var cancelText = 'No';
      var erroralter ="Cancel Request";
        var confirmCallback=function(){
          var requestCallback=function(response){
            if(response.status == 'success') {
                viewcallback(response.route);
                //location.reload();  
                }
            }
   
            ajaxGetRequest(url,requestCallback);

        }
        confirmAlert(confirmCallback,content,successmessage,errormessage,title,confirmText,cancelText,successalter,erroralter);
    }

      function createimage(element)
      {
        var validImage = ['image/gif','image/jpeg','image/png'];
          var file = element.files[0];
             var fietype = file['type'];
             var id = $(element).attr('id');
             var message = $(element).attr('data-message');

              if($.inArray(fietype,validImage) < 0){
              $('#parent-'+id).addClass('has-error'); 
              
                   $('#error-'+id).text(message);
              }
            else{
             $('#parent-'+id).removeClass('has-error'); 
             $('#error-'+id).text('');
              $('#image-'+id).removeClass('invisible'); 
              $('#image-'+id).addClass('visible'); 

              read_URL(element,0);
              }
      }

      function showroutelist(element,exta=false){

                  var value = $(element).val();
                  console.log(value);
                  var id = $(element).attr('id');
                  var url = $(element).attr('data-url')+'/'+value;
                  if(exta){
                    url = url+'/'+exta;
                  }
                  var viewshow = 'view-'+id;
                  showview(element,viewshow,url);
                 }

    function checkshowmodal(element,selector=false){
          var id = $(element).attr('id');
        
            id = id.replace("checkbox-", "");
            var selectvalue = $('#busroutedetails').val();

            if(selector){
              var checkempty = $.trim( $('#'+selector).val() );
            }
          
             if( checkempty !='' && selector) {

              showmodal(element,checkempty);
            }
        else{
          if(selectvalue.length == 0){
          $(element).prop('checked', false);
          var head = 'Error';
          var msg = 'Please select atlist one student';
          var type = 'error';
          showtoster(head,msg,type);
        }
      
        }
    }

    /*for location mangment*/

    function cancellocation(id){
      $('#checkbox-'+id).prop('checked',false);
    }

    function updatelocation(id)
    {
      var pick_place = $('#pickup-place-'+id).val();
      var pickup_time = $('#time-'+id).val();
      var pickup_image = $('#pickup_image-'+id+'-value').val();
      var dropup_place = $('#dropup-place-'+id).val();
      var dropup_time = $('#dropup-time-'+id).val();
      var dropup_image = $('#dropup_image-'+id+'-value').val();
      $('#pick_place-'+id).val(pick_place);
      $('#pick_time-'+id).val(pickup_time);
      $('#pick_image-'+id).val(pickup_image);
      $('#drop_place-'+id).val(dropup_place);
      $('#drop_time-'+id).val(dropup_time);
      $('#drop_image-'+id).val(dropup_image);
      $('.modal').modal('hide');

    }

    function aftercall_method(data){
 
      $('.'+data).find('.active').trigger('click');
    }

    function eachinputvalue(name,assinelement){
      var value = '';
      $('input[name="'+name+'[]"]').each(function(){
        if(value == ''){
          if($(this).is(":checked")){
          value = $(this).val();
        }
        }
        else{
          if($(this).is(":checked")){
          value = value+'_'+$(this).val();
           }
        }
      });
      $('#'+assinelement).val(value);
      
    }
    function eachinputcommon(element)
    {
      var value = '';
      var classname = $(element).attr('class');
      var commonclassname = 'child-common';
      
     $('.'+classname).each(function(){
        
          if($(this).is(":checked"))
            {
          
            }
        else{
          $(this).removeClass(classname);
          $(this).addClass(commonclassname);
          var elementid = $(this).attr('id');
          var childid = elementid.replace("pick_drop_common_", "");
          var dpickup  = $('#student_street_'+childid).val();
          $('#pick_drop_time_'+childid).val(dpickup);
          $('#pick_drop_time_td_'+childid).text(dpickup);
        }
      });

    }

    function addcommonpick()
    {
        console.log('test');
      var commonclassname = 'child-common';
      var classname = 'child-commoned';
       
       var modalopen = false;
       $('.'+commonclassname).each(function(){
        if($(this).is(":checked"))
            {
              modalopen = true;
            }
       });
       if(modalopen){
        $('#responsive-modal-2').modal('show');
       }
       

    }



     function shownotifiction(id,type=false){
  var url=$(id).val();

  var data="";
  var successCallback = function(a){
   
  }
  getAjaxView(url,data=null,'notification-custom',false,'get');
  var count = $('.sl-item').length;
  $('#notification-count').text(count);
 
 }
 
  function showmodalcustom(url,modalclass,ajaxclass){
 
          getAjaxModal(url,{},ajaxclass,false,{},modalclass);
  }

  function selectpaymenttype(element)
  {
    var class_info = $(element).attr('id');
    var value = $(element).val();
    var class_name = class_info.replace("-type", "");
    $("."+class_name).each(function() {
        $(this).addClass('d-none');
    });

    $("."+class_name+"-input").each(function(){
       $(this).removeAttr('name');
         })
     
     var selectedText =$("#"+class_info).find("option:selected").attr('data-class');
    selectedText = selectedText.toLowerCase();
    $('#'+selectedText+'-'+class_name).removeClass('d-none');
    $('#'+class_name+'-button').removeClass('d-none');
    $("#"+selectedText+'-input').attr('name', 'hand_over_date');
    


  }

  function showpassword(element){

  $(element).toggleClass("fa-eye fa-eye-slash");
  var input = $(element).attr("toggle");

   if ($(input).attr("type") == "password") {
    $(input).attr("type", "text");
  } else {
    $(input).attr("type", "password");
  }

  }

  function confirmmessage(){
          var requestCallback=function(response){
            if(response.status == 'success') {
                swal("Inaccurate!", "Successfully taken your vote", "info");
                  setTimeout(function(){ location.reload();}, 1500);
                }
              else{
                    swal("Oops!", "Your already voted", "error");
                  
                }
            }
  }

  function printhtml(element)
  {
   var  url = $(element).attr('data-url');
    var viewid = 'main-container';
    var data ='';
    var successcallback = function(result){
      printRawHtml(result);
    }
    getAjaxView(url,data=null,viewid,successcallback,'get');
  }

   function printRawHtml(view) {
      printJS({
        printable: view,
        type: 'raw-html',
        
      });
    }

    function confirmajaxAlert(element)
    {
       var  url = $(element).attr('data-url');
       var title= $(element).attr('data-title');
       var success= $(element).attr('data-success');
       var error= $(element).attr('data-error');
       var text= $(element).attr('data-text');
       var successbutton= $(element).attr('data-successbutton');
       var cancelbutton= $(element).attr('data-cancelbutton');
       var alartsuccess= $(element).attr('data-alartsuccess');
       var alarterror= $(element).attr('data-alarterror');

             var confirmCallback=function(){
          var requestCallback=function(response){
            if(response.status == 'success') {
                viewcallback(response.route);
               
                }
            }
   
            ajaxGetRequest(url,requestCallback);

        }
                swal({
          title: title,
          text: text,
          type: "info",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: successbutton,
          cancelButtonText: cancelbutton,
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            confirmCallback();
            swal(alartsuccess, success, "success");
          } else {
        
                swal(alarterror, error, "error");
                
          }
        });
    }

       function shownotifictioncustomer(id,type=false){
  var url=$(id).val();

  var data="";
  var successCallback = function(a){
   
  }
  getAjaxView(url,data=null,'notification-custom',false,'get');
  var count = $('.sl-item').length;
  $('#notification-count').text(count);
 
 }
 
  function selectavterimage(element){
  var id = $(element).attr('id'); 
  $('.image_avater').each(function(){
    $(this).removeClass('avater-selected');
  });
  $('.image-input').each(function(){
    $(this).removeAttr('name');
  });
  $(element).addClass('avater-selected');
  console.log(id+'-input');
  $('#'+id+'-input').attr('name', 'upload_profile_pic');
 
 }

 /*new function ecome*/
 function removeactive(classname){
  $('.'+classname).each(function(){
        $(this).removeClass('active');
    });
 }

 function showdata(element){
  
  var url = $(element).attr('data-url');
  var value = $(element).val();
  var datachangeid = $(element).attr('data-change-id');
  
  url = url+'/'+value;
 
  var successCallback = function(a){
   
  var responsedata =  JSON.parse(a)
console.log(responsedata.content_id);
  $( datachangeid+" option").each(function()
    {
   
    var optionvalue = $(this).val();

    if(optionvalue == responsedata.content_id){
  
    $(this).prop("selected", true);
  }
  else{
  
    $(this).prop("selected", false);
  }
    });
  }
  
  getAjaxdata(url,successCallback);
 }

 function showedit(element){
  var rowid  = element.id.replace('value-', '');
        $('#show-'+rowid).addClass('d-none');
        $('#datashow-'+rowid).removeClass('d-none');
 }

 function removeEidt(element){
   var rowid  = element.id.replace('minus-', '');
        $('#show-'+rowid).removeClass('d-none');
        $('#datashow-'+rowid).addClass('d-none');
 }

 function langfromsubmit(element){
  var XCSRFTOKEN = $('meta[name=csrf-token]').attr('content');
   var rowid  = element.id.replace('add-', '');
        
        var language = $(element).attr('data-id');
        var key = $('#key-'+rowid).text();
        var group = $('#group-'+rowid).text();
        var value = $('#data-'+rowid).val();
        var link = $(element).attr('data-url');
        var successCallback= function(a){
         
           $('#show-'+rowid).text(value);
          $('#data-'+rowid).val(value);
          $('#show-'+rowid).removeClass('d-none');
           $('#datashow-'+rowid).addClass('d-none');
           showtoster(a.heading,a.msg,a.status)

        }

        var data = {"_token": XCSRFTOKEN,'group':group,'key':key,'value':value };
          
        ajaxFormSubmit(link,data,null,successCallback);
 }

   function submitDetailsForm(element) {
      var fromid = $(element).attr('data-form-id')
       $(fromid).submit();
    }

      function showchainview(element,url,view_port,viewshow='yes'){
      var data ='';

     
      var viewid = view_port;
   
 
      getAjaxView(url,data=null,viewid,false,'get');
  if($(element).attr('data-shoping-cart')){
    
    var data_shoping_item  = $(element).attr('data-shoping-cart');
    var data_shoping_cart_total  = $(element).attr('data-shoping-cart-total');
     setTimeout(function() {changeShopingtotal(data_shoping_item,data_shoping_cart_total)},1000);
   }
 
  }

  function productqtychange(element,plus='no'){
    var total_view = parseInt($(element).attr('data-number-of-view'));
    var y= 1;
   for (let i = 0; i < total_view; i++) { 
    var view_port= $(element).attr('data-view-port-'+y);
    var url = $(element).attr('data-url-'+y);
      if($(element).attr('data-input-id-'+y)) {
        var input  = $(element).attr('data-input-id-'+y);
        if(plus == 1){
          /*add*/
          var url_exta = parseInt($(input).val())+1;
         

        }
        else if(plus == 2){
          var url_exta = parseInt($(input).val())-1;
          
        }
        
        $(input).val(url_exta);
        url = url+'/'+url_exta;
        if($(element).attr('data-view-other-'+y)){
          var viewouther = $(element).attr('data-view-other-'+y)
          url = url+'/'+viewouther;
        }
        
             
    }
    if(i == 0){
      console.log(view_port);
    showchainview(element,url,view_port);
  }
  else{
    var set_time = parseInt($(element).attr('data-set-time'))
    var time = set_time*i;
    setTimeout(function() { showchainview(element,url,view_port); }, time);
  }
    y++;
   }

  }
  function changeShopingtotal(data_shoping_item,data_shoping_cart_total){
    var shop_item = $(data_shoping_item).val();
    var shop_amout = $(data_shoping_cart_total).text();
 
    $('#item-amount').text(shop_amout);
    $('#item-min').text(shop_item);


      }
       function changewishlist(data_shoping_item){
       
    var shop_item = $(data_shoping_item).val();
    
    
    $('#wishlist-item').text(shop_item);


      }
 function showchange(element){
  var element_id = $(element).attr('data-id');
  if($(element).is(':checked')){
    $(element_id).removeClass('d-none');
  }
  else{
    $(element_id).addClass('d-none');
  }
 }

 function showmodal_product(){
  $('#exampleModal').modal('toggle');
 }

 function showSweetalart(title,text,icon,timer=2000){
  console.log(title+text+icon+timer);
  swal({
    title:'',
    text: text,
    icon: icon,
    timer: timer,
    button: false,
})
 }

 function loader_ajax(ajaxclass){
  $("#"+ajaxclass).empty();
  var html = '<div class="loader"><span></span><span></span><span></span><h2>Loading....</h2></div>';
  $("#"+ajaxclass).html(html);
  $('.loader').removeClass('d-none');
  $('#'+ajaxclass).addClass('bodyloadclass');
 }
 function removeloader(ajaxclass){
  $("#"+ajaxclass).empty();
  
  $("#"+ajaxclass).removeClass('bodyloadclass');
 }

 function showoverlay(id,classname){
  $('#'+id).addClass(classname);
 }
 function showoverlayremove(id,classname){
  $('#'+id).removeClass(classname);
 }

 function qtyincruse(element,type){
  var va_id = $(element).attr('data-parent-id'); 
  var valu = parseInt($(va_id).val());

  if(type == 1){
    valu = valu - 1;
    if(valu == 0){
      $(va_id).val(1);
    }
    else{
    $(va_id).val(valu);
  }
  }
  else{
valu = valu + 1;
$(va_id).val(valu);
  }

 }

 //getAjaxViewAppend
 
 function appendview(element,url_option = 'no',viewshow='yes',url=''){
  //console.log(element);
  var total_page = parseInt($(element).attr('data-total-page'));
    var load_page = parseInt($(element).attr('data-loaded-page'));
  var XCSRFTOKEN = $('meta[name=csrf-token]').attr('content');
    var data={"_token": XCSRFTOKEN,"total_page":total_page,"load_page":load_page};
    var appendId = $(element).attr('data-viewport');
  //  console.log(appendId);
    var url = $(element).attr('data-url');
    var successcallback = function(a,appendId,total_page,load_page){
     
      if(load_page < total_page ){
      $('#'+appendId).append(a);
    }
    }
     var errorCallback = function(error){
      console.log(error);
  
    }
  ajaxFormSubmitcustom(url,data,'',successcallback,errorCallback,appendId,total_page,load_page);
      
  }

  function changeingdata(element){
    console.log('test');
     var $select = $(element).attr('data-id');
    var idToRemove = $(element).val();
  
    var values = $("#"+$select).val();
    //fruits.push("Kiwi");
    if (values) {
        var i = values.indexOf(idToRemove);
        if($(element).is(':checked')){
          values.push(idToRemove);
          $("#"+$select).val(values).change();
        }
        else{
            values.splice(i, 1);
            $("#"+$select).val(values).change();
        }
    }
    }
 function select_change(element){

   var url = $(element).attr('data-url');
   var viewport = $(element).attr('data-viewport');
  
   var id = $(element).attr('id');
   var idlist = $(element).attr('data-id-list');
   var val = $(element).val();

   var XCSRFTOKEN = $('meta[name=csrf-token]').attr('content');
   idlist = idlist.replace(id+'-','');
   
   idlist = idlist.slice(0, -1);
   const listarray = idlist.split("-");
    console.log(listarray);
    var data={"_token": XCSRFTOKEN,[id]:val};
    var otherjson;
   var  dyfuntion = $(element).attr('data-callback');
   console.log(dyfuntion);
    for(let i = 0; i < listarray.length; i++){
      var arrval = listarray[i];
       console.log(arrval);
      data[arrval] = $('#'+arrval).val();
     
    }

        var successcallback = function(a,viewport,total_page){
     
      
      $('#'+viewport).html(a);
      
     
        dyn_functions[total_page]();
      
    
    }
     var errorCallback = function(error){
      console.log(error);
  
    }
  ajaxFormSubmitcustom(url,data,'',successcallback,errorCallback,viewport,dyfuntion);
    console.log(url);     //showview(element,url_option,viewshow,url_exta);
    
 }

 function select_change_product(element,other = '100'){
  if(other == '100'){
    return false
  }
  else{

  }
 }

 function showSelect(element){
  var id = $(element).attr('id');
  var check_id = $(element).attr('data-check-id');
  $(check_id).prop('checked', true);
  if($(element).attr('data-type')) {

    var time_slot_id = $(element).attr('data-add')+$(element).attr('data-type');
    var html_dat = $(time_slot_id).html();
    $('#show-time-slot').html(html_dat);
    setTimeout(function(){
      $("#show-time-slot input").each(function(){
        var pr_id = $(element).attr('data-type');
        var ow_id = $(this).val();
        var y_id = 'time-slot-label-dayslot-'+pr_id+'-'+ow_id;
        $(this).attr('id',y_id);
        $(this).next().attr('data-check-id','#'+y_id)
      });
    },1000);
    //console.log(html_dat);
  }
  //$(check_id).is(":checked");
 }
  
  function flashinput(element){
    var data_class = $(element).attr('data-class');
    var data_id = $(element).attr('data-id');
    var data_url = $(element).attr('data-url');
    if($(element).is(":checked")){
      $(data_id).remove();
      $('.'+data_class).each(function(){
        $(this).val(' ');
      })
    }
    else{
     var view_id =  'address_view';
     getAjaxView(data_url,null,view_id,false,'get');
    }

  }
