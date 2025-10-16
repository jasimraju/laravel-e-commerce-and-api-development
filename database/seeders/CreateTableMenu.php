<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTableMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
          [
            'id' =>1,
            'name' => 'admin'
          ],
          [
            'id' =>2,
            'name' => 'businessuser'
          ],
          [
            'id' =>3,
            'name' => 'customer'
          ]

        ]);
    }
}
