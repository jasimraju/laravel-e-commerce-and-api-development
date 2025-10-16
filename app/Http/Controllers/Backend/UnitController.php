<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class UnitController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.unit');
        $this->main_view_port = 'layouts.backend.admin.inner.unit';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.unit_main';
        $sub_title = __('title.unit_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.unit_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.unit') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_unit') , 'callback'=>'','dataurl' =>route('admin.add.unit') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

           public function show(Unit_info $unit_info)
    {
        //
        $unitlists = Unit_info::get();

       
        $sub_title = __('title.unit_list');
        $main_view_port = $this->main_view_port.'.unit_list';
        return view($main_view_port,compact('sub_title','unitlists'));
    }

    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'unit_name' => 'required',
                                             
            ],
            [ 
                'unit_name.required' => __('message.please_write_a').' '.__('label.name'),
                                
               
            ]
        ); 
        $data=$request->all();
   
        /*lang*/
       

        /*add catgory*/
         if(empty($id)){
                $unit_ins =  Unit_info::createUnitInfo($data);

         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
            }
            else{
              $unit_ins =  Unit_info::updateUnitInfo($data,$id); 

         return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit;  
            }
        /*add catgory image*/
               
        

     
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.add_unit';
        
        $sub_title = __('title.add_unit');
       
        return view($main_view_port,compact('sub_title'));
    }
    else{
        $main_view_port = $this->main_view_port.'.add_unit';
        $unit_object = Unit_info::find($id);
        $sub_title = __('title.edit_unit');
       
        return view($main_view_port,compact('sub_title','unit_object'));
    }
    }
    }

}
