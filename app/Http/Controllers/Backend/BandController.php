<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class BandController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.band_managment');
        $this->main_view_port = 'layouts.backend.admin.inner.band';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.band_main';
        $sub_title = __('title.band_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.band_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.band') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_category') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.band') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

        public function show(Band_info $band_info)
            {
                //
                $bandlist = $band_info::with('image')->get();
               
                $sub_title = __('title.band_list');
                $main_view_port = $this->main_view_port.'.band_list';
                return view($main_view_port,compact('sub_title','bandlist'));
            }

    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'brand_company_name' => 'required',
                                              
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'brand_company_name.required' => __('message.please_write_a').' '.__('label.company').' '.__('label.name'),
                
                
               
            ]
        ); 
        $data=$request->all();
        if(empty($id)){
    $data_category_image = $data['band_log'];
    unset($data['band_log']);
    
                $catgory_ins =  Band_info::createBand($data);
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
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,7,1);
        

     
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
        $halal_ins =  Band_info::updateBand($data,$id);
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
        $main_view_port = $this->main_view_port.'.band_add';
     
        $sub_title = __('title.add_band_list');
       
        return view($main_view_port,compact('sub_title'));
    }
    else{
        $main_view_port = $this->main_view_port.'.band_add';
        $band_object = Band_info::with('image')->find($id);

        $sub_title = __('title.add_band_list');
       
        return view($main_view_port,compact('sub_title','band_object'));
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
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$id,7,1);
    }
}
