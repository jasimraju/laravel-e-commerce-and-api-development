<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_info;
use App\Models\Category_info;
use App\Models\Unit_info;
use App\Models\Department_info;
use App\Models\Division_info;
use App\Models\Halal_info;
use App\Models\Supplier_info;
use App\Models\Band_info;
use App\Models\Oject_Image;
use App\Models\Country_info;
use App\Models\Varient_info;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JoeDixon\Translation\Drivers\Translation;
use Auth;

class ProductController extends Controller
{
    public $main_title;
    public $main_view_port;
    public $translation;
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->main_title = __('menuitems.product');
        $this->main_view_port = 'layouts.backend.admin.inner.product';
    }

    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
         $main_view_port = $this->main_view_port.'.product_main';
        $sub_title = __('title.product_list');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

    private function sub_menu(){
        $listofview = array(array('title' =>__('title.product_list') , 'callback'=>'data-callback=datatable_config_scroll','dataurl' =>route('admin.list.product') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_product') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.products') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.add_variant') , 'callback'=>'data-callback=catgoryintial','dataurl' =>route('admin.add.products.variant') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.varient_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.product.variant') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

        public function show(Product_info $product_info)
    {
        //
        $productlist = $product_info::with('image')->with('halal')->with('varient')->with('category')->get();
    
  
        $sub_title = __('title.product_list');
        $main_view_port = $this->main_view_port.'.product_list';
        return view($main_view_port,compact('sub_title','productlist'));
    }

      public function create(Request $request,$id=null)
    {

        if($request->isMethod('post')){
             $request->validate(
            [
                'product_name' => 'required',
                'unit_id' => 'required',
                                              
            ],
            [ 
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'description.required' => __('message.please_write_a').' '.__('label.descripiton'),
                
                
               
            ]
        ); 
        $data=$request->all();

    $data_category_image = $data['category_image'];
    unset($data['category_image']);
      
            $lastid = Product_info::latest()->first();
            if(empty($lastid)){
                $data['product_number'] = '0001';
            }
            else{
                $data['product_number'] = '000'.$lastid->id+1;
            }
        /*add catgory*/
                $catgory_ins =  Product_info::createProduct($data);
        /*add catgory image*/
         $path =  storage_path().'/app/public'.'/image';
         $image = new Image;
        $oject_Image = new Oject_Image;
        $folder_location = '/image';
        if(is_array($data_category_image)){
            $i=1;
                foreach($request->category_image as $allimage){
                    
                     $logo_sm = img_process($allimage,$path,$i);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                   
                     $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,3,1);
                     $i++;
                }
            
        }
        else{
               
                $logo_sm = img_process($data_category_image,$path);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                   
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,3,1);
                 }
        

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.product_add';
        $categorylist = Category_info::select('id','name','language_file_name')->get();
        $unitlist = Unit_info::get();
        $supplierlist = Supplier_info::get();
        $brandlist = Band_info::get();
        $halallist = Halal_info::get();
        $depantmentlist = Division_info::get();
        $depantmentlist = Division_info::get();
        $countries = Country_info::get();
        
        if(empty($id)){
       $sub_title = __('title.add_product');
        return view($main_view_port,compact('sub_title','categorylist','unitlist','supplierlist','brandlist','halallist','depantmentlist','sub_title','countries'));
    }
    else{
         $sub_title = __('title.edit_product');
         $product_object = Product_info::with('image')->find($id);
        return view($main_view_port,compact('sub_title','categorylist','unitlist','supplierlist','brandlist','halallist','depantmentlist','sub_title','countries','product_object'));
    }
    }
    }

    /*vari*/

    public function variantshow($productId = null){
        if(!empty($productId)){
        $product = Product_info::with('image')->with('unit')->with('varient.image')->with('category')->where('id',$productId)->get();
    }
    else{
        $product = Product_info::with('image')->with('unit')->with('varient.image')->with('category')->get();
    }

       
  
        $sub_title = __('title.varient_list');
        $main_view_port = $this->main_view_port.'.varient_list';
        return view($main_view_port,compact('sub_title','product'));
    }

    public function variantcreate(Request $request,$product_id = null){
        if($request->isMethod('post')){
             $request->validate(
            [
                'product_info_id' => 'required',
                'varient_name' => 'required',
                'weight' => 'required',
                'rsp_w_gst' => 'required|numeric',
                'gp_percentage' => 'required|numeric',

                                              
            ],
            [ 
                'product_info_id.required' => __('message.please_write_a').' '.__('label.name'),
                'varient_name.required' => __('message.please_write_a').' '.__('label.name'),
                'weight.required' => __('message.please_write_a').' '.__('label.weight'),
                'rsp_w_gst.required' => __('message.please_write_a').' '.__('label.rsp_w_gst'),
                'gp_percentage.required' => __('message.please_write_a').' '.__('label.gp_percentage'),
        
            ]
        ); 
        $data=$request->all();
    $data_category_image = $data['category_image'];
    unset($data['category_image']);
        /*lang*/
      /*  translationadd($this->translation,$data['language_file_name'],$data['name']);
        $data['name'] = convertlow_andremovespace($data['name']);
        translationadd($this->translation,$data['language_file_name'],$data['description']);
        $data['description'] = convertlow_andremovespace($data['description']);
        if(!empty($data['more_details'])){
            translationadd($this->translation,$data['language_file_name'],$data['more_details']);
        $data['more_details'] = convertlow_andremovespace($data['more_details']);
            }*/
            $data['product_sku'] = "00".$data['product_info_id']."00".$data['supplier_id'];
         
        /*add catgory*/
                $catgory_ins =  Varient_info::createVarient($data);
        /*add catgory image*/
                
        $path =  storage_path().'/app/public'.'/image';
         $image = new Image;
        $oject_Image = new Oject_Image;
        $folder_location = '/image';
        if(is_array($data_category_image)){
            $i=1;
                foreach($request->category_image as $allimage){
                    
                     $logo_sm = img_process($allimage,$path,$i);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                   
                     $this->ojectImage($oject_Image,$saveimage->id,$catgory_ins->id,9,1);
                     $i++;
                }
            
        }

     
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.varient_add';
        $productlist = Product_info::select('id','product_name')->get();
        $unitlist = Unit_info::get();
        $supplierlist = Supplier_info::get();
    
        $sub_title = __('title.add_variant');
        if(!empty($product_id)){
            $product_id = Product_info::find($product_id);
        }
       
        return view($main_view_port,compact('sub_title','productlist','unitlist','supplierlist','product_id'));
    }
    }

    public function showuniqe($id=null){
      $productlist = Product_info::select('id','unit_id AS content_id','product_name')->where('id',$id)->first();
      return json_encode($productlist);
    }

}
