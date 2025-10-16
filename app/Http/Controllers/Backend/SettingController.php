<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItems;
use App\Models\Menu;
use App\Models\Country_info;
use App\Models\Category_info;
use App\Models\Supplier_info;
use App\Models\Band_info;
use App\Models\Product_info;
use App\Models\Varient_info;
use App\Models\Frontpagelist;
use App\Models\Silder_and_other_banner;
use App\Models\Oject_Image;
use App\Models\Image;
use App\Models\Sliderbuttonlist;
use App\Models\App_setting;
use App\Models\Address_info;
use App\Models\Weekly_deal;
use App\Models\Weekly_details;
use JoeDixon\Translation\Http\Requests\LanguageRequest;
use JoeDixon\Translation\Drivers\Translation;
use JoeDixon\Translation\Http\Requests\TranslationRequest;
use JoeDixon\Translation\Language;
use Illuminate\Support\Collection;

use Illuminate\Support\Str;
use Config;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $translation;


    public $main_title;
    public $main_view_port;
    public $main_view_port_silder;
    public $main_view_port_app;
    public $weekly_deals;
    public function __construct(Translation $translation)
    {
        $this->main_title = __('menuitems.settings');
        $this->main_view_port = 'layouts.backend.admin.inner.setting';
        $this->main_view_port_silder = 'layouts.backend.admin.inner.silder';
        $this->weekly_deals = 'layouts.backend.admin.inner.weekly_deals';
        $this->main_view_port_app = 'layouts.backend.admin.inner.app_setting';
        $this->translation = $translation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menu();
        $main_title = $this->main_title;
        $main_view_port = $this->main_view_port.'.menu_setting';
        $sub_title = __('title.menu_setting');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }
    public function menulist(){
      $menuitems = MenuItems::with('childmenu')->with('menutype')->whereNull('parent_id')->orderBy('order')->get();
        
     
        $sub_title = __('title.menu_list');
        $main_view_port = $this->main_view_port.'.menu_list';
        return view($main_view_port,compact('sub_title','menuitems'));
    }

     public function language(){
      $languages = Language::get();
        $sub_title = __('title.language_list');
        $main_view_port = $this->main_view_port.'.language_list';
        return view($main_view_port,compact('sub_title','languages'));
        
    }

    public function sub_menu(){
        $listofview = array(array('title' =>__('title.menu_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.menu') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.menu_add') ,'dataurl' =>route('admin.add.menu') ,'icon' =>'fas fa-cog','callback'=>'data-callback=iconpicker','view_port'=>"main-sub-view"),array('title' =>__('title.language_list'),'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.lang.menu') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.add_language'),'dataurl' =>route('admin.add.lang.menu') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.language_correction'),'callback'=>'data-callback=datatable_config_scroll','dataurl' =>route('admin.group.lang.menu','en') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"),array('title' =>__('title.add_new_country'),'dataurl' =>route('admin.add.country') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view"));
        return $listofview;
    }

    /*view methods*/

    public function addmenu(Request $request){
    if($request->isMethod('post')){
             $request->validate(
            [
                'title' => 'required',
                'icon' => 'required',
                'menu_id' => 'required',                                
            ],
            [
                'title.required' => __('message.please_write_a').' '.__('label.title'),
                'icon.required' => __('message.please_write_a').' '.__('label.icon'),
                'menu_id.required' => __('message.please_select_a').' '.__('label.menu_type'),
                
               
            ]
        ); 

        $data=$request->all();
    
        /*lang*/
        translationadd($this->translation,$data['language_file_name'],$data['title']);
        
        $data['title'] = convertlow_andremovespace($data['title']);
        $data['order'] = '7';
        if(empty($request->parent_id)){
        $parent_menu_list = Menu::with(['menu_items' => function($query) {
          $query->orderBy('order', 'desc')->first();
      }])->where('id',$request->menu_id)->first();
    }
    else{
        $parent_id = $request->parent_id;
        $parent_menu_list = Menu::with(['menu_items' => function($query) use ($parent_id) {
          $query->where('parent_id',$parent_id)->orderBy('order', 'desc')->first();
      }])->where('id',$request->menu_id)->first();
    }
    if(empty($parent_menu_list->menu_items[0]->order)){
        $data['order'] =0;
    }
    else{
        $data['order'] =$parent_menu_list->menu_items[0]->order+1;
    }
   
         MenuItems::createMenuItems($data);
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.menu_add';

        $sub_title = __('title.add_new_menu');
        $parent_menu_lists = Menu::with(['menu_items' => function($query) {
          $query->whereNull('parent_id')->where('status',1);
      }])->get();
        return view($main_view_port,compact('sub_title','parent_menu_lists'));
    }
    }

     public function addlanguage(Request $request){
    if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'language' => 'required',
                                              
            ],
            [
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'language.required' => __('message.please_write_a').' '.__('label.language'),
                
                
               
            ]
        ); 

        $data=$request->all();
    
        /*lang*/
        $language = Language::createLanguge($data); 
             $this->translation->addLanguage($data['language'], $data['name']);
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.language_add';

        $sub_title = __('title.add_language');
       
        return view($main_view_port,compact('sub_title'));
    }
    }

    public function translation(Request $request, $language){
      
        if ($request->has('language') && $request->get('language') !== $language) {
            return redirect()
                ->route('settins.translation', ['language' => $request->get('language'), 'group' => $request->get('group'), 'filter' => $request->get('filter')]);
        }

        $languages = $this->translation->allLanguages();
        $groups = $this->translation->getGroupsFor(config('app.locale'))->merge('single');
        $translations = $this->translation->filterTranslationsFor($language, $request->get('filter'));

        if ($request->has('group') && $request->group) {
            if ($request->group === 'single') {
                $translations = $translations->get('single');
                $translations = new Collection(['single' => $translations]);
            } else {
                $translations = $translations->get('group')->filter(function ($values, $group) use ($request) {
                    return $group === $request->group;
                });

                $translations = new Collection(['group' => $translations]);
            }
        }
        $main_view_port = $this->main_view_port.'.language_spelling';

        $sub_title = __('title.language_correction');
        
        return view($main_view_port,compact('sub_title','language', 'languages', 'groups', 'translations'));
         
    }

       public function translationupdate(Request $request, $language)
    {
        if (! Str::contains($request->group, 'single')) {
            $this->translation->addGroupTranslation($language, $request->get('group'), $request->get('key'), $request->get('value') ?: '');
        } else {
            $this->translation->addSingleTranslation($language, $request->group, $request->key, $request->value ?: '');
        }

          return response()->json(['status'=>'success','msg'=>__('message.update_successfully'),'heading' => __('message.success'),'is_pagereload' => 'no'], 200);exit;
    }
   public function edit_menu(Request $request,$id){
    //$route = route('admin.edit.menu');
    if($request->isMethod('post')){
             $request->validate(
            [
                'title' => 'required',
                
                                                
            ],
            [
                'title.required' => __('message.please_write_a').' '.__('label.title'),
                
                
                
               
            ]
        ); 

        $data=$request->all();
    
        /*lang*/
        translationadd($this->translation,$data['language_file_name'],$data['title'],$data['key']);
        
       unset($data['title']);
       unset($data['key']);
    
         MenuItems::updateMenuItems($data,$id);
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.menu_edit';
        $menus = MenuItems::find($id);
        $sub_title = __('title.edit_menu');
        $parent_menu_lists = Menu::with(['menu_items' => function($query) {
          $query->whereNull('parent_id')->where('status',1);
      }])->get();
        return view($main_view_port,compact('sub_title','parent_menu_lists','menus'));
    }

   } 

   public function addCountry(Request $request){
    if($request->isMethod('post')){
             $request->validate(
            [
                'name' => 'required',
                'country_code' => 'required',
                                              
            ],
            [
                'name.required' => __('message.please_write_a').' '.__('label.name'),
                'country_code.required' => __('message.please_write_a').' '.__('label.country_code'),
               
                
               
            ]
        ); 

        $data=$request->all();
    
     
   
         Country_info::createCountry($data);
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port.'.country_add';

        $sub_title = __('title.add_new_country');
       
        return view($main_view_port,compact('sub_title'));
    }
    }

    /*silder setting*/
     public function indexsider()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menusider();
        $main_title = $this->main_title;
        $main_view_port =  $this->main_view_port_silder.'.index';
        $sub_title = __('title.show_silder');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }


      public function sub_menusider(){
        $listofview = array(array('title' =>__('title.show_slider_list') , 'callback'=>'data-callback=datatable_config','dataurl' =>route('admin.list.slider') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ),array('title' =>__('title.add_slider') ,'dataurl' =>route('admin.add.slider') ,'icon' =>'fas fa-cog','callback'=>'data-callback=iconpicker','view_port'=>"main-sub-view"));
        return $listofview;
    }

    public function showSlider(){
            $main_view_port = $this->main_view_port_silder.'.viewsider';

        $sub_title = __('title.show_slider_list');
        $siderlist = Frontpagelist::with('slider.image')->get();
       
       
        return view($main_view_port,compact('sub_title','siderlist'));
    }

       public function addnewslider(Request $request){
    if($request->isMethod('post')){
             $request->validate(
            [
                'slider_image' => 'required',
                'type' => 'required',
                
                                              
            ],
            [
                'slider_image.required' => __('message.please_select_a').' '.__('title.image'),
                'type.required' => __('message.please_select_a').' '.__('label.slider_for_which_page'),
               
               
                
               
            ]
        ); 

        $data=$request->all();
         $data_category_image = $data['slider_image'];
         $data_button_links = $data['button_link'];
         $data_button_titles = $data['button_title'];
        unset($data['slider_image']);
        unset($data['button_link']);
        unset($data['button_title']);
         /*add catgory image*/
           $slider =  Silder_and_other_banner::createBanner($data);
        
           if(!empty($data_button_links[0]) || !empty($data_button_titles[0])){
            $i=0;
           foreach ($data_button_titles as $data_button_title) {
              /*insert button*/
              if(!empty($data_button_title)){
              $data_button['title'] = $data_button_title;
              $data_button['frontpage_id'] = $data_button_links[$i];
              $data_button['slider_id'] =   $slider->id;
              
              $data_save = Sliderbuttonlist::createBannerButton($data_button);
          }


           }
       }
         $path =  storage_path().'/app/public'.'/banner';
         $image = new Image;
        $oject_Image = new Oject_Image;
        $folder_location = '/banner';
        if(is_array($data_category_image)){
            $i=1;
                foreach($request->slider_image as $allimage){
                    
                     $logo_sm = img_process($allimage,$path,$i);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                   
                     $this->ojectImage($oject_Image,$saveimage->id,$slider->id,5,1);
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
                   
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$slider->id,5,1);
                 }
     
   
        
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port_silder.'.addslider';

        $sub_title = __('title.add_slider');
        $pagelist = Frontpagelist::get();
       
        return view($main_view_port,compact('sub_title','pagelist'));
    }
    }


     /*silder setting*/
     public function indexappsetting()
    {
        $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_menuapp();
        $main_title = $this->main_title;
        $main_view_port =  $this->main_view_port_silder.'.index';
        $sub_title = __('title.app_setting');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));
    }

       public function addnewappsetting(Request $request){
    if($request->isMethod('post')){
             $request->validate(
            [
                'app_name' => 'required',
                'title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
                'address' => 'required',
                'unit' => 'required',
                'apartment' => 'required',
                'town_city' => 'required',
                'phone' => 'required',
                'country_id' => 'required',
                'app_log' => 'required',
                'app_fev_icon' => 'required',
                'post_code' => 'required',
                
                                              
            ],
            [
                'app_name.required' => __('message.please_write_a').' '.__('label.app_name'),
                'post_code.required' => __('message.please_write_a').' '.__('label.post_code'),
                'title.required' => __('message.please_write_a').' '.__('label.title'),
                'meta_title.required' => __('message.please_write_a').' '.__('title.meta').' '.__('label.title'),
                'meta_description.required' => __('message.please_write_a').' '.__('title.meta').' '.__('label.descripiton'),
                'meta_keywords.required' => __('message.please_write_a').' '.__('title.meta').' '.__('label.keywords'),
                'address.required' => __('message.please_write_a').' '.__('title.address'),
                'unit.required' => __('message.please_write_a').' '.__('label.unit'),
                'apartment.required' => __('message.please_write_a').' '.__('label.apartment'),
                'town_city.required' => __('message.please_write_a').' '.__('label.city_name'),
                'phone.required' => __('message.please_write_a').' '.__('label.phone'),
                'country_id.required' => __('message.please_select_a').' '.__('label.country'),
                'app_log.required' => __('message.please_select_a').' '.__('title.image').' '.__('title.app_log'),
                'app_fev_icon.required' => __('message.please_select_a').' '.__('title.image').' '.__('title.title.fav_icon'),
               
               
               
                
               
            ]
        ); 

        $data=$request->all();
        $dataaddress = array('rel_id' => 999,'address' => $data['address'],'unit' => $data['unit'],'apartment' => $data['apartment'],'town_city' => $data['town_city'],'phone' => $data['phone'],'country_id' => $data['country_id'],'post_code' => $data['post_code'] );
  
          $data_app_log = $data['app_log'];
         $data_app_fev_icon = $data['app_fev_icon'];
        unset($data['address']);
        unset($data['unit']);
        unset($data['apartment']);
        unset($data['town_city']);
        unset($data['country_id']);
        unset($data['phone']);
        unset($data['app_log']);
        unset($data['app_fev_icon']);
        unset($data['post_code']);

        /*insert or edit address*/
        $addressobj = new Address_info();
            $address_id =  $this->address_add($addressobj,$dataaddress); 
        /*insert or edit app log*/
        $folder_location = '/image';
        $app_logo = $this->saveimage($data_app_log,$folder_location);
        /*insert or edit app fav icon*/
        $app_fav_icon = $this->saveimage($data_app_fev_icon,$folder_location);
         /*add app settin */
         $appsetting = new App_setting();
         $data['address_id'] = $address_id;
         $data['app_logo_id'] = $app_logo['image'];
         $data['app_fev_icon'] = $app_fav_icon['image'];
           $app_setting =  $this->address_add($appsetting,$data);
               
         return response()->json(['status'=>'success','msg'=>__('message.add_successfully'),'heading' => __('message.success'),'is_pagereload' => 'yes'], 200);exit; 
    }
    else{
        $main_view_port = $this->main_view_port_app.'.app_setting';

        $sub_title = __('title.app_setting');
        $countrys = Country_info::get();
       
        return view($main_view_port,compact('sub_title','countrys'));
    }
    }

       public function sub_menuapp(){
        $listofview = array(array('title' =>__('title.app_setting') ,'dataurl' =>route('admin.add.addnewappsetting') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ));
        return $listofview;
    }

    private function saveimage($value,$folder_location,$object_type=null,$option_id=null,$object_status=1){
        $return_array = array();
        
        $path =  storage_path().'/app/public'.$folder_location;
         $image = new Image;
        $oject_Image = new Oject_Image;
      
        if(is_array($value)){
            $i=1;
                foreach($value as $allimage){
                    
                     $logo_sm = img_process($allimage,$path,$i);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    
                    /*add image object*/
                   if(!empty($object_type)){
                     $this->ojectImage($oject_Image,$saveimage->id,$option_id,$object_type,$object_status);
                 }
                     $i++;
                }
            
        }
        else{
        
                $logo_sm = img_process($value,$path);
                 $imageName= $logo_sm[0].'.'.$logo_sm[1];
                                $type=1;
                                $a_type=2;
                                
                      
                    $saveimage = $this->addimage($image,$imageName,$logo_sm[1],$folder_location);
                    $return_array['image'] = $saveimage->id;
                    /*add image object*/
                   if(!empty($object_type)){
                     $save = $this->ojectImage($oject_Image,$saveimage->id,$option_id,$object_type,$object_status);
                     $return_array['object_image'] = $save->id;

                 }
                 }
                 return $return_array;
    }

    public function address_add($object,$data,$id=null){
        if(empty($id)){
            /*insert*/
            $object_ins = $object::createAddress($data);
            return $object_ins->id; 
        }
        else{
            /*update*/
            $object_upd = $object::updateAddress($data,$id);
            return $id; 
        }

    }
    /*workly deal*/

    public function indexweeklydeals(){
      $menuitems = $this->showallmenu(1);
        $sub_menus = $this->sub_weeklydeal();
        $main_title = $this->main_title;
        $main_view_port =  $this->weekly_deals.'.index';
        $sub_title = __('title.app_setting');
        return view('layouts.backend.admin.page.index',compact('menuitems','sub_menus','main_title','sub_title','main_view_port'));

    }

        public function sub_weeklydeal(){
        $listofview = array(array('title' =>__('title.add_weekly_deals') ,'callback'=>'data-callback=config_date_range data-callback-length=2 data-callback-1=select2_config data-callback-2=touchspin_config','dataurl' =>route('admin.add.weeklydeal') ,'icon' =>'fas fa-cog','view_port'=>"main-sub-view" ));
        return $listofview;
    }

      public function add_weeklydeals(Request $request){
        if($request->isMethod('post')){
             $request->validate(
            [
                'start_end_date' => 'required',
                'p_or_amount' => 'required',
                'type' => 'required', 
                'varient_id' => 'required|array|min:1',                               
            ],
            [
                'start_end_date.required' => __('message.please_select_a').' '.__('label.select_start_and_end_date'),
                'p_or_amount.required' => __('message.please_write_a').' '.__('label.percentage_fixed'),
                'type.required' => __('message.please_select_a').' '.__('label.type'),
                'varient_id.required' => __('message.please_select_a').' '.__('label.varient').' '.__('label.search'),
                
               
            ]
        ); 
          $data = $request->all();


          }
          else{
        $main_view_port_folder = $this->weekly_deals;
        $main_view_port = $this->weekly_deals.'.product_band_cat_supplier_varient';

        $sub_title = __('title.add_weekly_deals');
        $catgorise_list = $this->parent_catlist(new Category_info,2);

        $supplier_list = $this->supplier_list(new Supplier_info);
        $band_list = $this->supplier_list(new Band_info);
        $product_list = $this->parent_productlist_show(new Product_info);
        $varient_list = $this->all_varient(new Varient_info);
       
        return view($main_view_port,compact('sub_title','catgorise_list','supplier_list','band_list','product_list','varient_list','main_view_port_folder'));
    }
      }

      public function add_weeklydeals_otherview(Request $request,$type)
      {
        $main_view_port_folder = $this->weekly_deals;
        $main_view_port = $this->weekly_deals.'.weekly_product_varient_view';

        $catgriselist = array('varient_list' => [], 'product_list' => []);
        $supplierlist = array('varient_list' => [], 'product_list' => []);
        $bannerlist = array('varient_list' => [], 'product_list' => []);
        $productlist = array('varient_list' => [], 'product_list' => []);
        $varientlist = array('varient_list' => [], 'product_list' => []);
          $data = $request->all();
         
        if(!empty($request->catgory_list))
        {
          /*catgrise*/
          $catgriselist = $this->showCatgorywithproduct(new Category_info,$request->catgory_list);
      

        }
        if(!empty($request->supplier_list)){
          /*supplier*/
          $supplierlist = $this->showsupplierwithproduct(new Supplier_info,$request->supplier_list);
         
        
        }
        if(!empty($request->band_list)){
          /*barnd*/
          $bannerlist = $this->showbanerwithproduct(new Band_info,$request->band_list);
        
        
        }
        if(!empty($request->product_list)){
          /*product*/
          $productlist = $this->showproductWithvarient(new Product_info,$request->product_list);
          
        

        }
        if(!empty($request->varient_list)){
          /*varient*/
          
          $varientlist = $this->showvarientwithproduct(new Varient_info,$request->product_list);
      
        
        }

          $product_list = $this->parent_productlist_show(new Product_info);
        $varient_list = $this->all_varient(new Varient_info);
        $catgriselist['product_list'] = $this->margeArray($catgriselist['product_list'],$supplierlist['product_list']);
        $catgriselist['varient_list'] = $this->margeArray($catgriselist['varient_list'],$supplierlist['varient_list']);
        $bannerlist['product_list'] = $this->margeArray($catgriselist['product_list'],$bannerlist['product_list']);
        $bannerlist['varient_list'] = $this->margeArray($catgriselist['varient_list'],$bannerlist['varient_list']);
        $productlist['product_list'] = $this->margeArray($productlist['product_list'],$bannerlist['product_list']);
        $productlist['varient_list'] = $this->margeArray($productlist['varient_list'],$bannerlist['varient_list']);
        $varientlist['product_list'] = $this->margeArray($productlist['product_list'],$varientlist['product_list']);
        $varientlist['varient_list'] = $this->margeArray($productlist['varient_list'],$varientlist['varient_list']);

        $productlistdata = $varientlist['product_list'];
        $varientlistdata = $varientlist['varient_list'];
          

        return view($main_view_port,compact('product_list','varient_list','main_view_port_folder','productlistdata','varientlistdata'));

      }



}
