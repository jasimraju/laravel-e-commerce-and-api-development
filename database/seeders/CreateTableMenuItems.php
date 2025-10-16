<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTableMenuItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
          [
            'id' =>1,
            'title' => 'dashboard',
            'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,

          ],[
            'id' =>2,
            'title' => 'customers',
            'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,
            
          ],[
            'id' =>3,
            'title' => 'business_customer',
             'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,
          ],[
            'id' =>4,
            'title' => 'product',
             'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,         ],
            [
            'id' =>5,
            'title' => 'category',
             'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,
          ],[
            'id' =>6,
            'title' => 'settings',
            'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,
          ],[
            'id' =>7,
            'title' => 'other',
            'menu_id' =>1,
            'icon' =>'<i class="bx bx-home-circle"></i>',
            'parent_id' => null,
            'order' => 1,
            'route' => 'home',
            'model_name' => null,
            'module_id' => 0,
            'status' => 1,
            'language_file_name' => 'menuitems',
            'key' => null,
          ] ]);
    }
}
