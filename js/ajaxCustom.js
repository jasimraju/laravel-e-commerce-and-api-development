
    $( document ).ajaxError(function( response ) 
    {
        "use strict";
        if ( response.status ===500) {
    
            toastMessage(i18n.layout.error+'!','error',i18n.layout.please_contact_us_to_report_this_issue);
            location.reload();
    
        }
    });


    function getAjaxModal(url,dataid={},ajaxclass='#modal-ajaxview',callback=false,data={},modalclass='#ajax-modal',method='get')
    {
        
    $.ajax({
        url:url,
        type:method,
        data:data,
        beforeSend:function(xhr){
           
        },
        success:function(result){ 
           
            $(modalclass).modal('show');
            if(callback){
                callback(result);
                return;
            }
            $(ajaxclass).html(result); 
            $(".modal-body #form_submited").val(dataid);

        },error:function(a,b){

            toastr.error(a.responseJSON.status, i18n.layout.error+'!',{ closeButton: true });
                      
        }
        });
    }

    function getAjaxView(url,data={},ajaxclass,callback=false,method='get')
    {
       
        $.ajax({
            url:url,
            type:method,
            data:data,
            beforeSend:function(xhr){
             loader_ajax(ajaxclass);  
            },
            success:function(result){
                removeloader(ajaxclass);
                if(callback){
                    callback(result);
                return;
                }
                $('#'+ajaxclass).html(result);
            },
            error:function(a){
                if(a.responseJSON.status == 'fail') {
            error= a.responseJSON.msg;
            toastr.error(i18n.layout.error+'!', error,{ closeButton: true });
        }
        else{
                console.log(a.responseJSON);
        }
                           
            }
        });
        return false;
    }

    function getAjaxViewAppend(url,data={},ajaxclass,callback=false,method='get')
    {
      
        $.ajax({
        url:url,
        type:method,
        data:data,
        beforeSend:function(xhr){
            
        },
        success:function(result){
            if(callback){
                callback(result);
            return;
            }
            $('#'+ajaxclass).append(result);
        },
        error:function(a){
           toastr.error(a.responseJSON.status, i18n.layout.error+'!',{ closeButton: true });
                      
        }
        });
     return false;
    }

    function ajaxGetRequest(url,successCallback='',errorCallback='',datatypes='json')
    {
        
        $.ajax({
        url:url,
        type:'Get',     
        dataType:datatypes
        ,
        success:function(result){ 
            if(successCallback){
                successCallback(result);
                return;
            } 
            toastr.success("Updated Successfully!", "Success !!!",{ closeButton: true });  
        },error:function(a){
         
            if(errorCallback){
                errorCallback(a);
                return;
            }
            toastr.error(a.responseJSON.status, i18n.layout.error+'!',{ closeButton: true });
        }
        });
    }

    function ajaxValidationFormSubmit(url,data={},submitId='',successCallback,errorCallback)
    {
        
         var erroCallback=function(json){
            var error='';
            if(json.status == 422) {
                var errors = json.responseJSON.errors;  
                if(!errorCallback){
    
                          
                $.each(json.responseJSON.errors, function (key, value) {
                    error+=value+'<br>';
                   
                }); 
        }
        else{
                errorCallback(errors);
                        return;
                 }
    
                                      
            }
            if(json.status == 500) {
                error=json.responseText;
                 
            }
            if(json.status == 401) {
                error= i18n.layout.permission_denied;
            }
            showtoster()
           // toastr.error(error, i18n.layout.error+'!',{ closeButton: true });
                     
        };
        if(!successCallback){
    
            successCallback=function(){
                toastr.success("Updated Successfully!", "Success!!!",{ closeButton: true });
                
            } ;
        }
        ajaxFormSubmit(url,data,'',successCallback,erroCallback);
    }


    function ajaxFormSubmit(url,data={},submitId='',successCallback,errorCallback)
    {
  

        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType: 'json',
          
            beforeSend:function(xhr){
            
            $('span.error').html('');
            },
          
            success:function(result){ 
                if(successCallback){
                   
                    successCallback(result);
                    return;
                }           
            },error:function(a){
                    if(errorCallback){
                        errorCallback(a);
                        return;
                    }  
                     else{
                     toastr.error(a.responseJSON.status, i18n.layout.error+'!',{ closeButton: true });   
                    }
            }
        });
    }

    function getAjaxdata(url,successCallback,method='get')
    {
      
        $.ajax({
            url:url,
            type:method,
       
         beforeSend:function(xhr){
            
                 },
        success:function(result){
            if(successCallback){
                successCallback(result);
                return;
            } 
            
            
        },
        error:function(a){
            toastr.error(i18n.layout.please_contact_us_to_report_this_issu, i18n.layout.error+'!',{ closeButton: true });
                      
        }
         });
        return false;
    }


      function confirmAlert(callback='',content='You will not be able to recover this information!?',successmessage="Your information has been deleted.",errormessage='Your information is safe :)' ,title='Are you sure?!',confirmText="Yes, delete it!",cancelText="No, cancel plx!",successalter="Deleted!",erroralter="Cancelled")
    {
       
                swal({
          title: title,
          text: content,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: confirmText,
          cancelButtonText: cancelText,
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            callback();
            swal(successalter, successmessage, "success");
          } else {
        
                swal(erroralter, errormessage, "error");
                
          }
        });
    }


        function ajaxFormSubmitcustom(url,data={},submitId='',successCallback,errorCallback,appendId='',total_page='',load_page='')
    {
  

        $.ajax({
            url:url,
            type:'POST',
            data:data,
                     
            beforeSend:function(xhr){
            
          
            },
          
            success:function(result){ 
                if(successCallback){
                   
                    successCallback(result,appendId,total_page,load_page);
                    return;
                }           
            },error:function(a){
                    if(errorCallback){
                        errorCallback(a);
                        return;
                    }  
                     else{
                        console.log('hello');
                       
                    }
            }
        });
    }