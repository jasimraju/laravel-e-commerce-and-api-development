<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_user;
use App\Models\MenuItems;

class AdminController extends Controller
{
    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    
    public function __construct(){
    	
    }
    public function dashboard()
    {
    	/*menu loader*/
    	$menuitems = $this->showallmenu(1);
        $main_title = __('menuitems.dashboard');
        return view('layouts.backend.admin.page.dashboard',compact('menuitems','main_title'));
    }

}