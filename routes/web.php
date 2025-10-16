<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('homepage');
Route::get('/category/{id?}', [App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('homepage.category');
Route::get('/cart', [App\Http\Controllers\Frontend\FrontController::class, 'showcart'])->name('front.cart');
Route::get('/checkout', [App\Http\Controllers\Frontend\FrontController::class, 'showcheckout'])->name('front.checkout');
Route::any('/registration', [App\Http\Controllers\Frontend\FrontController::class, 'registration'])->name('front.registration');
Route::get('/login_customer/{mes?}', [App\Http\Controllers\Frontend\FrontController::class, 'login'])->name('front.log.login');
Route::get('/login_customer_ajax', [App\Http\Controllers\Frontend\FrontController::class, 'login_ajax'])->name('front.log.login.ajax');
Route::get('/forget_customer/{mes?}', [App\Http\Controllers\Frontend\FrontController::class, 'forgetpassword'])->name('front.log.forgetpassword');
Route::post('/request_restpassword', [App\Http\Controllers\Frontend\FrontController::class, 'request_restpassword'])->name('front.log.request_restpassword');
Route::any('/forget_customer_reset/{token}', [App\Http\Controllers\Frontend\FrontController::class, 'forgetpassword_rest'])->name('front.log.forgetpassword_rest');


Route::get('/productdetisl/{id}', [App\Http\Controllers\Frontend\FrontController::class, 'productdetails'])->name('shoping.producd.detils');      
/*all product*/    
Route::any('/allproduct/{cat_id?}', [App\Http\Controllers\Frontend\FrontController::class, 'productalllist'])->name('shoping.producd.all');          
Route::get('/flashproduct/{id?}', [App\Http\Controllers\Frontend\FrontController::class, 'show_flash_product'])->name('shoping.flashproduct');    

Route::get('/show_filler/{cat_id?}',[App\Http\Controllers\Frontend\FrontController::class, 'show_filler'])->name('product.show_filler');    

          
/*start facebook login*/
Route::get('/facebooklogin', [App\Http\Controllers\Auth\LoginController::class, 'facebookRedirect'])->name('facebook.login');
Route::get('/facebooklogin/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithFacebook'])->name('facebook.logincallback');
/*end facebook login*/

/*start facebook login*/
Route::get('/gmaillogin', [App\Http\Controllers\Auth\LoginController::class, 'gmailRedirect'])->name('gmail.login');
Route::get('/gmaillogin/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginWithGmail'])->name('gmail.logincallback');
/*end facebook login*/

Route::get('/weeklydeals', [App\Http\Controllers\ApiController::class, 'weelky_deals']);
Route::group(['prefix'=>'shop'], function ()
            {
      Route::get('/addcart/{id}/{qty?}/{view?}', [App\Http\Controllers\Frontend\FrontController::class, 'addcart'])->name('shoping.cart.add');
      Route::get('/addwishlist/{id}/{view?}', [App\Http\Controllers\Frontend\FrontController::class, 'addwishlist'])->name('shoping.wishlist.add');
       Route::get('/deletedcart/{id}/{view?}', [App\Http\Controllers\Frontend\FrontController::class, 'removeShopingcart'])->name('shoping.cart.deleted');          
             
Route::get('/cart_view/{view?}', [App\Http\Controllers\Frontend\FrontController::class, 'showcartmin'])->name('shoping.cart.showcart');          
            });
Route::post('/checkout/submit', [App\Http\Controllers\Frontend\FrontController::class, 'completedorder'])->name('front.checkout.submit');


Route::group(['middleware' => ['auth:web']], function () {
/*customer auth*/
Route::get('/dashboard/customer',[App\Http\Controllers\Frontend\CustomerController::class,'index'])->name('customer.dashboard');
Route::get('/dashboard/customer/single',[App\Http\Controllers\Frontend\CustomerController::class,'shwdashboard'])->name('customer.dashboard.single');
Route::get('/dashboard/notification',[App\Http\Controllers\Frontend\CustomerController::class,'shwnotification'])->name('customer.notification');
Route::get('/dashboard/orderhistory',[App\Http\Controllers\Frontend\CustomerController::class,'shworderhistory'])->name('customer.orderhistory');
Route::get('/dashboard/carddetails',[App\Http\Controllers\Frontend\CustomerController::class,'shwcarddetails'])->name('customer.carddetails');
Route::any('/dashboard/changepassword',[App\Http\Controllers\Frontend\CustomerController::class,'shwchangepassword'])->name('customer.changepassword');
Route::any('/dashboard/accountdetaisl',[App\Http\Controllers\Frontend\CustomerController::class,'shwwprofileedit'])->name('customer.accountdetaisl');
Route::get('/dashboard/shwaddress',[App\Http\Controllers\Frontend\CustomerController::class,'shwaddress'])->name('customer.shwaddress');
Route::any('/dashboard/addeditaddress/{id?}',[App\Http\Controllers\Frontend\CustomerController::class,'shwaddress'])->name('customer.shwaddress');
Route::any('/dashboard/addressmodal/{id?}',[App\Http\Controllers\Frontend\CustomerController::class,'addressmodal'])->name('customer.addressmodal');
Route::get('/dashboard/address/delete()/{id?}',[App\Http\Controllers\Frontend\CustomerController::class,'addressDeleted'])->name('customer.address.delete');
Route::get('/dashboard/orderdetails/{id?}',[App\Http\Controllers\Frontend\CustomerController::class,'orderdetails'])->name('customer.orderdetails');
Route::get('/dashboard/shwwishlist',[App\Http\Controllers\Frontend\CustomerController::class,'shwwishlist'])->name('customer.shwwishlist');
});





//Route::get('/allproduct', [App\Http\Controllers\ApiController::class, 'all_product']);
Route::get('/daycheck', [App\Http\Controllers\ApiController::class, 'showslot']);


/*admin panel*/

Route::get('/soymlink', [App\Http\Controllers\Auth\LoginController::class, 'soymlink'])->name('soymlink');
Route::get('/orderdetails/{orderid}/{id}', [App\Http\Controllers\ApiController::class, 'orderdetails']);
Route::get('/emailtest', [App\Http\Controllers\Frontend\FrontController::class, 'sendforgetpassword'])->name('emailtest');
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminloginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminloginController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminloginController::class, 'logout'])->name('admin.logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::get('user/address', [App\Http\Controllers\Frontend\FrontController::class, 'showajaxaddress'])->name('user.address');


Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/setting', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('admin.setting');

    /*category*/
    Route::get('admin/category', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('admin.category');
    /*product mangment*/
     Route::get('admin/product', [App\Http\Controllers\Backend\ProductController::class, 'index'])->name('admin.product');
      Route::get('admin/halal', [App\Http\Controllers\Backend\HalaController::class, 'index'])->name('admin.halal');
      Route::get('admin/unit', [App\Http\Controllers\Backend\UnitController::class, 'index'])->name('admin.unit');
       Route::get('admin/band', [App\Http\Controllers\Backend\BandController::class, 'index'])->name('admin.band');
         Route::get('admin/supplier', [App\Http\Controllers\Backend\SupplierController::class, 'index'])->name('admin.supplier');
          Route::get('admin/div', [App\Http\Controllers\Backend\DivisionController::class, 'index'])->name('admin.div');
          Route::get('admin/dept', [App\Http\Controllers\Backend\DeptartmentController::class, 'index'])->name('admin.dept');
           Route::get('admin/order', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('admin.order');
           Route::get('admin/order/setting', [App\Http\Controllers\Backend\OrderController::class, 'setting_index'])->name('admin.setting.order');
           /*clase group*/
           Route::get('admin/class', [App\Http\Controllers\Backend\DivisionController::class, 'product_class'])->name('admin.class');

            Route::get('admin/sider', [App\Http\Controllers\Backend\SettingController::class, 'indexsider'])->name('admin.sider');
            Route::get('admin/appsetting', [App\Http\Controllers\Backend\SettingController::class, 'indexappsetting'])->name('admin.app_setting');
             Route::get('admin/weeklydeals', [App\Http\Controllers\Backend\SettingController::class, 'indexweeklydeals'])->name('admin.weekydeals');

                Route::get('admin/customer', [App\Http\Controllers\Backend\CustomerController::class, 'index'])->name('admin.customer');



    Route::group(['prefix'=>'admin/innerview'], function ()
      {
        Route::any('/menu/setting/add',[App\Http\Controllers\Backend\SettingController::class, 'addmenu'])->name('admin.add.menu');
                

        Route::any('/menu/setting/list',[App\Http\Controllers\Backend\SettingController::class, 'menulist'])->name('admin.list.menu');
        Route::any('/menu/setting/edit/{id}',[App\Http\Controllers\Backend\SettingController::class, 'edit_menu'])->name('admin.edit.menu');

        /*lang*/
          Route::any('/menu/setting/lang',[App\Http\Controllers\Backend\SettingController::class, 'addlanguage'])->name('admin.add.lang.menu');

        Route::get('/menu/setting/lang/list',[App\Http\Controllers\Backend\SettingController::class, 'language'])->name('admin.list.lang.menu');

         Route::get('/menu/setting/lang/group/{language}',[App\Http\Controllers\Backend\SettingController::class, 'translation'])->name('admin.group.lang.menu');
         Route::any('/menu/setting/lang/update/{language}',[App\Http\Controllers\Backend\SettingController::class, 'translationupdate'])->name('admin.group.lang.update');

        /*country*/
        Route::any('/country/setting/add',[App\Http\Controllers\Backend\SettingController::class, 'addCountry'])->name('admin.add.country');


        /*category*/
        Route::any('/menu/category/add/{id?}',[App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('admin.add.category');
        Route::get('/menu/category/list',[App\Http\Controllers\Backend\CategoryController::class, 'show'])->name('admin.list.category');


        /*product*/
        Route::get('/menu/product/list',[App\Http\Controllers\Backend\ProductController::class, 'show'])->name('admin.list.product');
        Route::any('/menu/product/add/{id?}',[App\Http\Controllers\Backend\ProductController::class, 'create'])->name('admin.add.products');
        Route::any('/menu/product/showuniqe/{id?}',[App\Http\Controllers\Backend\ProductController::class, 'showuniqe'])->name('admin.showuniqe.products');

         /*product*/
        Route::get('/menu/product/variant/list/{id?}',[App\Http\Controllers\Backend\ProductController::class, 'variantshow'])->name('admin.list.product.variant');
        Route::any('/menu/product/variant/add/{id?}',[App\Http\Controllers\Backend\ProductController::class, 'variantcreate'])->name('admin.add.products.variant');


        /*hala*/
        Route::get('/menu/halal/list',[App\Http\Controllers\Backend\HalaController::class, 'show'])->name('admin.list.halal');
         Route::any('/menu/halal/add/{id?}',[App\Http\Controllers\Backend\HalaController::class, 'create'])->name('admin.add.halal');
         Route::any('/menu/halal/product/add/{id?}',[App\Http\Controllers\Backend\HalaController::class, 'create_update_product'])->name('admin.add.product.halal');

        /*unit*/
        Route::get('/menu/unit/list',[App\Http\Controllers\Backend\UnitController::class, 'show'])->name('admin.list.unit');
        Route::any('/menu/unit/add/{id?}',[App\Http\Controllers\Backend\UnitController::class, 'create'])->name('admin.add.unit');

        /*band*/
        Route::get('/menu/band/list',[App\Http\Controllers\Backend\BandController::class, 'show'])->name('admin.list.band');
         Route::any('/menu/band/add/{id?}',[App\Http\Controllers\Backend\BandController::class, 'create'])->name('admin.add.band');

          /*supplier*/
        Route::get('/menu/supplier/list',[App\Http\Controllers\Backend\SupplierController::class, 'show'])->name('admin.list.supplier');
         Route::any('/menu/supplier/add/{id?}',[App\Http\Controllers\Backend\SupplierController::class, 'create'])->name('admin.add.supplier');

          /*division*/
        Route::get('/menu/division/list',[App\Http\Controllers\Backend\DivisionController::class, 'show'])->name('admin.list.division');
         Route::any('/menu/division/add/{id?}',[App\Http\Controllers\Backend\DivisionController::class, 'create'])->name('admin.add.division');

           /*deptartment*/
        Route::get('/menu/deptartment/list',[App\Http\Controllers\Backend\DeptartmentController::class, 'show'])->name('admin.list.deptartment');
         Route::any('/menu/deptartment/add/{id?}',[App\Http\Controllers\Backend\DeptartmentController::class, 'create'])->name('admin.add.deptartment');

          /*class and group class*/
        Route::get('/menu/class/list',[App\Http\Controllers\Backend\DivisionController::class, 'show_class'])->name('admin.list.class');
         Route::any('/menu/class/add/{id?}',[App\Http\Controllers\Backend\DivisionController::class, 'create_class'])->name('admin.add.class');
          Route::get('/menu/group_class/list',[App\Http\Controllers\Backend\DivisionController::class, 'show_group_class'])->name('admin.list.group_class');
         Route::any('/menu/group_class/add',[App\Http\Controllers\Backend\DivisionController::class, 'create_group_class'])->name('admin.add.group_class');

              /*order*/
        Route::get('/menu/order',[App\Http\Controllers\Backend\OrderController::class, 'show'])->name('admin.order.list');
        Route::get('/menu/order/details/{id}',[App\Http\Controllers\Backend\OrderController::class, 'show_order_details'])->name('admin.order.details.list');
         Route::get('/menu/order/setting/list',[App\Http\Controllers\Backend\OrderController::class, 'show_order_status'])->name('admin.setting.order.status.list');
          Route::any('/menu/order/setting/add',[App\Http\Controllers\Backend\OrderController::class, 'create_status'])->name('admin.setting.order.status.add');

             /*slider */
        Route::get('/menu/slider/list',[App\Http\Controllers\Backend\SettingController::class, 'showSlider'])->name('admin.list.slider');
        Route::any('/menu/slider/add',[App\Http\Controllers\Backend\SettingController::class, 'addnewslider'])->name('admin.add.slider');
            Route::any('/menu/appsetting/add',[App\Http\Controllers\Backend\SettingController::class, 'addnewappsetting'])->name('admin.add.addnewappsetting');

            /*weekly deal*/
            Route::any('/menu/weeklydeal/add',[App\Http\Controllers\Backend\SettingController::class, 'add_weeklydeals'])->name('admin.add.weeklydeal');
            Route::post('/menu/weeklydeal/prouct_varient/{type}',[App\Http\Controllers\Backend\SettingController::class, 'add_weeklydeals_otherview'])->name('admin.weeklydeal.product_varient');



        /*customer*/
        Route::get('/menu/customer/list',[App\Http\Controllers\Backend\CustomerController::class, 'show'])->name('admin.list.customer');
         Route::any('/menu/customer/add',[App\Http\Controllers\Backend\CustomerController::class, 'create'])->name('admin.add.customer');
                Route::get('/menu/customer/delete/{id}',[App\Http\Controllers\Backend\CustomerController::class, 'delete_customer'])->name('admin.delete.customer');
                Route::get('/menu/customer/order/{id}',[App\Http\Controllers\Backend\CustomerController::class, 'show_customer_order'])->name('admin.order.customer');
        
    });

});


