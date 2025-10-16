<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division_info;
use App\Models\Product_class;
use App\Models\Product_groupclass;
use App\Models\Product_class_groupclass;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class DivisionController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.category');
        $this->main_view_port = 'layouts.backend.admin.inner.division';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.division_main';
        $sub_title = __('title.category_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

     public function product_class()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu_class();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.division_main';
        $sub_title = __('title.category_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.division_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.division') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_division') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.division') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

      private function sub_menu_class(){
        $listofview = array(array('title' =>__('title.product_class_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.class') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_product_class') , 'dataurl' =>route('admin.add.class') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.product_class_group_list') , 'callback'=>'data-callback=datatable_config', 'dataurl' =>route('admin.list.group_class') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.add_product_class_group'),'callback'=>'data-callback=select2_config', 'dataurl' =>route('admin.add.group_class') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

public function show(Division_info $division_info)
    {
        //
        $divisions = $division_info::get();

       
        $sub_title = __('title.division_list');
        $main_view_port = $this->main_view_port.'.division_list';
        return view($main_view_port,compact('sub_title','divisions'));
    }

    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                                             
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                                
               
            ]
        ); 
        $data=$request->all();
   
        /*lang*/
       

        /*add catgory*/
        if(empty($id)){
                $unit_ins =  Division_info::createDivision($data);
                 return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
            }
        /*add catgory image*/
               
        else{
             $unit_ins =  Division_info::updateDivision($data,$id);
             return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
        }

     
        
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.add_division';
        
        $sub_title = __('title.add_division');
       
        return view($main_view_port,compact('sub_title'));
    }
    else{
        $main_view_port = $this->main_view_port.'.add_division';
        $divi_object = Division_info::find($id);
        $sub_title = __('title.edit_division');
       
        return view($main_view_port,compact('sub_title','divi_object'));
    }
    }
    }


    public function show_class(Product_class $product_class)
    {
        //
        $product_classes = $product_class::get();

       
        $sub_title = __('title.product_class_list');
        $main_view_port = $this->main_view_port.'.product_class_list';
        return view($main_view_port,compact('sub_title','product_classes'));
    }

    public function create_class(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
               
                                             
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'number.required' => __('message.please_write_a').' '.__('label.number'),
                                
               
            ]
        ); 
        $data=$request->all();
   
        /*lang*/
       

        /*add catgory*/
        if(empty($id)){
                $unit_ins =  Product_class::createProduct_class($data);

         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
            }
            else{
                $unit_ins =  Product_class::updateProduct_class($data,$id); 

         return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
            }
        /*add catgory image*/
               
        

     
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.product_class_add';
        
        $sub_title = __('title.add_product_class');
       
        return view($main_view_port,compact('sub_title'));
    }
    else{
       $main_view_port = $this->main_view_port.'.product_class_add';
        $product_class_object = Product_class::find($id);
        $sub_title = __('title.add_product_class');
       
        return view($main_view_port,compact('sub_title','product_class_object'));  
    }
    }
    }

    public function show_group_class(Product_groupclass $product_class)
    {
        //
        $product_classes = $product_class::get();

       
        $sub_title = __('title.product_class_group_list');
        $main_view_port = $this->main_view_port.'.product_classgroup_list';
        return view($main_view_port,compact('sub_title','product_classes'));
    }

    public function create_group_class(Request $request)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'number' => ['required','unique:product_groupclasses'],
                                             
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'number.required' => __('message.please_write_a').' '.__('label.number'),
                                
               
            ]
        ); 
        $data=$request->all();
   
        /*lang*/
       

        /*add catgory*/
                $productgroup_class =  Product_groupclass::createProduct_groupclass($data);
        /*add catgory image*/
               $data_rel['class_id'] = $data['class_id'];
               $data_rel['groupclass_id'] = $productgroup_class->id;
        
               $createProduct_class_groupclass = Product_class_groupclass::createProduct_class_groupclass($data_rel);
     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
    }
    else{
        $product_classes = Product_class::get();
        $main_view_port = $this->main_view_port.'.product_classgroup_add';
        
        $sub_title = __('title.add_product_class_group');
       
        return view($main_view_port,compact('sub_title','product_classes'));
    }
    }


}
