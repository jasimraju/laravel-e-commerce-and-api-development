<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department_info;
use App\Models\Division_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class DeptartmentController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.category');
        $this->main_view_port = 'layouts.backend.admin.inner.deptartment';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.deptartment_main';
        $sub_title = __('title.department_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.department_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.deptartment') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_department') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.deptartment') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

    public function show(Department_info $department_info)
    {
        //
        $departments = $department_info::get();

       
        $sub_title = __('title.department_list');
        $main_view_port = $this->main_view_port.'.deptartment_list';
        return view($main_view_port,compact('sub_title','departments'));
    }

    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'div_info_id' => 'required',
                                             
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'div_info_id.required' => __('message.please_select_a').' '.__('label.division').' '.__('label.name'),
                                
               
            ]
        ); 
        $data=$request->all();
   
        /*lang*/
       

        /*add catgory*/
        if(empty($id)){
                $unit_ins =  Department_info::createDepartment($data);
                return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
            }
            else{
              $unit_ins =  Department_info::updateDepartment($data,$id);
              return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
            }  
            
        /*add catgory image*/
               
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit; 
    }
    else{
        if(empty($id)){
        $main_view_port = $this->main_view_port.'.add_deptartment';
        $divisions = Division_info::get();
        $sub_title = __('title.add_department');
       
        return view($main_view_port,compact('sub_title','divisions'));
    }
    else{

       $main_view_port = $this->main_view_port.'.add_deptartment';
        $divisions = Division_info::get();
        $sub_title = __('title.edit_department');
       $dep_object = Department_info::find($id);
        return view($main_view_port,compact('sub_title','divisions','dep_object')); 
    }
    }
    }

}
