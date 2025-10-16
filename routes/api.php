<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::post('apply_forget', [ApiController::class, 'applyforforgetpassword']);
Route::post('forgetpassword', [ApiController::class, 'changeyoupassword']);
Route::get('appcredential', [ApiController::class, 'socailappsetting']);
Route::post('thirdpartyapplogin', [ApiController::class, 'authenticatefacebook']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('get_category', [ApiController::class, 'get_category']);
    Route::post('get_product', [ApiController::class, 'get_product']);//category wise
    Route::post('post_favorite', [ApiController::class, 'post_fav_porduct']);
    Route::get('wishlist/{user_id}/{type}/{showlist?}', [ApiController::class, 'myWishlist']);
    Route::get('address/{user_id}/', [ApiController::class, 'get_address']);
    Route::get('get_country/', [ApiController::class, 'get_country']);
    Route::post('addresscreate/{id?}', [ApiController::class, 'register_address']);
    /*new api*/
    Route::post('addressremove', [ApiController::class, 'addressDeleted']);
    Route::post('add_data_card/{id?}', [ApiController::class, 'register_card']);
    Route::post('cardremove_data', [ApiController::class, 'cardDeleted']);
    Route::get('card/{user_id}/', [ApiController::class, 'get_card']);
    Route::get('get_sider/{type}/', [ApiController::class, 'get_sider_data']);
    Route::get('allproduct/', [ApiController::class, 'all_product']);
    Route::get('hot_product/', [ApiController::class, 'all_hot_product']);
    Route::get('varient_details/{id}', [ApiController::class, 'product_details']);
    Route::get('get_slot/', [ApiController::class, 'showslot']);
    Route::get('get_payment_methods/', [ApiController::class, 'showpayment_methods']);
    Route::get('refresh/', [ApiController::class, 'refresh']);
    Route::post('promocode', [ApiController::class, 'promo_code_check'])->name('pormo_code');
    Route::post('order', [ApiController::class, 'promo_code_check'])->name('orderapi');
    Route::post('orderhistory', [ApiController::class, 'orderlist'])->name('orderhistory');
    Route::post('orderhistory/last', [ApiController::class, 'orderlist'])->name('orderhistorylast');
    Route::post('change_password', [ApiController::class, 'change_password']);
    Route::post('update_profile', [ApiController::class, 'update_profile']);
    Route::get('weelkydeals', [ApiController::class, 'weelky_deals']);
     Route::post('orderdetails', [ApiController::class, 'orderdetails'])->name('orderdetails');
    Route::post('addtocard', [ApiController::class, 'addcart'])->name('addtocard');
    Route::post('getcardinfo', [ApiController::class, 'getcardinfo'])->name('getcardinfo');
    Route::post('deletecarditems/{id?}', [ApiController::class, 'removeShopingcart'])->name('remove.shopingcart');
     Route::post('updateorcancel/{id?}', [ApiController::class, 'return_order'])->name('remove.shopingcart');
    
   
    
});