<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_info;
use App\Models\Oject_Image;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class CategoryController extends Controller
{

	public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.category');
        $this->main_view_port = 'layouts.backend.admin.inner.category';
    }


    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.category_main';
        $sub_title = __('title.category_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.category_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.category') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_category') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.category') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'bg_color' => 'required',                                
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'description.required' => __('message.please_write_a').' '.__('label.descripiton'),
                'bg_color.required' => __('message.please_select_a').' '.__('label.bg_color'),
                
               
            ]
        ); 
        $data=$request->all();
        if(empty($id)){
    $data_category_image = $data['category_image'];
    unset($data['category_image']);
        /*lang*/
        translationadd($this->translation,$data['language_file_name'],$data['name']);
        $data['name'] = convertlow_andremovespace($data['name']);
        translationadd($this->translation,$data['language_file_name'],$data['description']);
        $data['description'] = convertlow_andremovespace($data['description']);
        if(!empty($data['more_details'])){
            translationadd($this->translation,$data['language_file_name'],$data['more_details']);
        $data['more_details'] = convertlow_andremovespace($data['more_details']);
            }

        /*add catgory*/
                $catgory_ins =  Category_info::createCategory($data);
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
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,2,1);
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
     }
     else{
        $edit_category = $this->edit_category($data,$id);
       return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
     }
    }
    else{

        $main_view_port = $this->main_view_port.'.category_add';
        $categorylist = Category_info::select('id','name','language_file_name')->get();
        if(!empty($id)){
            /*edit*/
            $sub_title = __('title.edit_category');
            $catgory = Category_info::with('image')->find($id);
       
        return view($main_view_port,compact('sub_title','categorylist','catgory'));
        }
        else{
            /*add*/
        $sub_title = __('title.add_category');
       
        return view($main_view_port,compact('sub_title','categorylist'));
    }
    }
    }

       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category_info  $category_info
     * @return \Illuminate\Http\Response
     */
    public function show(category_info $category_info)
    {
        //
        $categorylist = $category_info::with('parent')->with('image')->get();
       
        $sub_title = __('title.category_list');
        $main_view_port = $this->main_view_port.'.category_list';
        return view($main_view_port,compact('sub_title','categorylist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category_info  $category_info
     * @return \Illuminate\Http\Response
     */
    public function edit(category_info $category_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category_info  $category_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category_info $category_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category_info  $category_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_info $category_info)
    {
        //
    }
    public function edit_category($data,$id){
        $p_cat = Category_info::find($id);
        $data_category_image = $data['category_image'];
        $update_id_image = $data['update_id_image'];
    unset($data['category_image']);
    unset($data['update_id_image']);
        /*lang*/
        $catgory_name  = convertlow_andremovespace($data['name']);
        if( $catgory_name == $p_cat->name){
            $data['name'] = $catgory_name; 
        }
        else{
            translationadd($this->translation,$data['language_file_name'],$data['name']);
            $data['name'] = $catgory_name;
        }

          $catgory_description  = convertlow_andremovespace($data['description']);
        if( $catgory_description == $p_cat->description){
            $data['description'] = $catgory_description; 
        }
        else{
            translationadd($this->translation,$data['language_file_name'],$data['more_details']);
            $data['description'] = $catgory_description;
        }

             $catgory_more_details  = convertlow_andremovespace($data['more_details']);
        if( $catgory_more_details == $p_cat->more_details){
            $data['more_details'] = $catgory_more_details; 
        }
        else{
            translationadd($this->translation,$data['language_file_name'],$data['more_details']);
            $data['more_details'] = $catgory_more_details;
        }
        
        
        
     

        /*update catgory*/
                $catgory_ins =  Category_info::updateCategory($data,$id);
        /*add catgory image*/
        if($data_category_image != $update_id_image){
              $path =  storage_path().'/app/public'.'/image';
             
                $logo_sm = img_process($data_category_image,$path);

                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                $folder_location = '/image';
                                 $image = new Image;
                    $saveimage = $this->updateimage($image,$imageName,$logo_sm[1],$folder_location,$update_id_image);
        }
              
                
    }
}
