<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier_info;
use App\Models\Country_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class SupplierController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.category');
        $this->main_view_port = 'layouts.backend.admin.inner.supplier';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.supplier_main';
        $sub_title = __('title.supplier_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.supplier_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.supplier') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_supplier') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.supplier') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

    public function show(Supplier_info $supplier_info)
    {
        //
        $supplierlist = $supplier_info::with('image')->get();
        
     
        $sub_title = __('title.supplier_list');
        $main_view_port = $this->main_view_port.'.supplier_list';
        return view($main_view_port,compact('sub_title','supplierlist'));
    }

    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'supplier_name' => 'required',
                'supplier_code' => 'required',
                                              
            ],
            [ 
                'supplier_name.required' => __('message.please_write_a').' '.__('label.name'),
                'supplier_code.required' => __('message.please_write_a').' '.__('label.code'),
                
                
               
            ]
        ); 
        $data=$request->all();
    $data_category_image = $data['band_log'];
    if(empty($id)){
    unset($data['band_log']);
        /*lang*/
     
        /*add catgory*/
                $catgory_ins =  Supplier_info::createSupplierInfo($data);
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
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,8,1);
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
     }
     else{
               $image = new Image;

         $data_category_image = $data['band_log'];
         if(isset($data['update_id_image'])){
            $update_id_image = $data['update_id_image'];
            unset($data['band_log']);
         }
         else{
            $update_id_image = null;
         }
        
        
        unset($data['update_id_image']);
        $halal_ins =  Supplier_info::updateSupplierInfo($data,$id);
        if(empty($update_id_image)){
            if(!empty($data_category_image)){
            $this->addimage_update($data_category_image,$id);
        }
        }
        else{
        $edit_category = $this->saveupdatedimage($data_category_image,$update_id_image,$image);
    }
       return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit;
     }
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.supplier_add';
     
        $sub_title = __('title.add_supplier');
        $countrylist = Country_info::get();
       
        return view($main_view_port,compact('sub_title','countrylist'));
    }
    else{
       $main_view_port = $this->main_view_port.'.supplier_add';
        $supplier_object = Supplier_info::with('image')->find($id);
        $sub_title = __('title.add_supplier');
        $countrylist = Country_info::get();
       
        return view($main_view_port,compact('sub_title','countrylist','supplier_object'));   
    }
    }
    }

        public function addimage_update($data_category_image,$id){
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
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$id,8,1);
    }

}
