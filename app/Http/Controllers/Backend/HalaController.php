<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halal_info;
use App\Models\Oject_Image;
use App\Models\Product_info;
use App\Models\Halal_details_info;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;
use Illuminate\Support\Facades\Route;

class HalaController extends Controller
{
    //
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.halal_managment');
        $this->main_view_port = 'layouts.backend.admin.inner.halal';
    }

    public function index()
    {
       $route = Route::current()->getName();
       // $sub_menus = $this->submenu($route)->toArray();
        
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.halal_main';
        $sub_title = __('title.halal_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.halal_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.halal') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_halal_list') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.halal') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }


public function show(Halal_info $halal_info)
    {
        //
        $halallist = $halal_info::with('image')->get();
        
     
        $sub_title = __('title.halal_list');
        $main_view_port = $this->main_view_port.'.halal_list';
        return view($main_view_port,compact('sub_title','halallist'));
    }

public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'authority' => 'required',
                'title' => 'required',
                                              
            ],
            [ 
                'authority.required' => __('message.please_write_a').' '.__('label.authority').' '.__('label.name'),
                'title.required' => __('message.please_write_a').' '.__('label.descripiton'),
                
                
               
            ]
        ); 
        $data=$request->all();
         if(empty($id)){
    $data_category_image = $data['halal_log'];
    unset($data['halal_log']);
        /*lang*/
       /* translationadd($this->translation,$data['language_file_name'],$data['name']);
        $data['name'] = convertlow_andremovespace($data['name']);
        translationadd($this->translation,$data['language_file_name'],$data['description']);
        $data['description'] = convertlow_andremovespace($data['description']);
        if(!empty($data['more_details'])){
            translationadd($this->translation,$data['language_file_name'],$data['more_details']);
        $data['more_details'] = convertlow_andremovespace($data['more_details']);
            }*/

        /*add catgory*/
                $catgory_ins =  Halal_info::createHalal($data);
        /*add catgory image*/
                $path =  storage_path().'/app/public'.'/image';
                $logo_sm = img_process($data_category_image,$path);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                $folder_location = '/image';
                      $image = new Image;
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                    $oject_Image = new Oject_Image;
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,6,1);
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
     }
     else{
         $image = new Image;
         $data_category_image = $data['halal_log'];
        $update_id_image = $data['update_id_image'];
        unset($data['halal_log']);
        unset($data['update_id_image']);
        $halal_ins =  Halal_info::updateHalal($data,$id);
        $edit_category = $this->saveupdatedimage($data_category_image,$update_id_image,$image);
       return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
     }
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.halal_add';
     
        $sub_title = __('title.add_halal_list');
       
        return view($main_view_port,compact('sub_title'));
    }
    else{
        $main_view_port = $this->main_view_port.'.halal_add';
        $halal_object = Halal_info::with('image')->find($id);
        $sub_title = __('title.edit_halal_list');
       
        return view($main_view_port,compact('sub_title','halal_object'));
    }
    }
    }

     public function addimage($image,$imageName,$ext,$folder_location){
                        $data['name'] = $imageName;
                        $data['upload_user_id'] = Auth::user()->id;
                        $data['image_ext'] = (!empty($ext)) ? $ext : Null;
                        $data['folder_location'] = (!empty($folder_location)) ? $folder_location : Null;;
                     
                        $saveimage = $image::createImage($data);
                        return $saveimage;
                    }

        public function ojectImage($oject_Image,$image_id,$object_id,$type,$status){
        
                        $oject_Image->image_id = $image_id;
                        $oject_Image->object_id = $object_id;
                        $oject_Image->object_type = $type;
                        $oject_Image->object_status = $status;
                     
                        $saveimage = $oject_Image->save();
                        return $saveimage;
                }

      public function create_update_product(Request $request,$product_id = null)
    {

        if($request->isMethod('post')){

             $request->validate(
            [
                'hala_info_id' => 'required',
                'product_info_id' => 'required',
                                             
            ],
            [ 
                'hala_info_id.required' => __('message.please_write_a').' '.__('label.name'),
                'product_info_id.required' => __('message.please_write_a').' '.__('label.name'),
                                
               
            ]
        ); 
        $data=$request->all();

  
                $halal_details =  Halal_details_info::createHalalDetails($data);
  
               
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
    }
    else{
        
           $main_view_port = $this->main_view_port.'.halal_add_product';
     $halal_org_list = Halal_info::get();
     $productlist = Product_info::where('status',1)->get();
        if(!empty($product_id)){
            $is_update = Halal_details_info::where('product_info_id',$product_id)->first();
        }
        else{
            $is_update = null;
        }
        $sub_title = __('title.add_unit');
       
        return view($main_view_port,compact('sub_title','halal_org_list','productlist','product_id','is_update'));
    }
    }  

        


}
