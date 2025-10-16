<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateCountryInfosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('country_infos')->insert([
            [
                'id' => 1,
                'country_code' => 47,
                'name' =>'Norway',
                'min_digits' => 8,
                'max_digits' => 8,
                'iso_code' => 'NO',
                'language' => 'bg'
                
            ],[
                'id' => 2,
                'country_code' => 95,
                'name' =>'Myanmar',
                'min_digits' => 11,
                'max_digits' =>11,
                'iso_code' => 'MY',
                'language' => 'bg'
                
            ],[
                'id' => 3,
                'country_code' => 46,
                'name' =>'Sweden',
                'min_digits' => 8,
                'max_digits' =>10,
                'iso_code' => 'SW',
                'language' => 'bg'
                
            ],
            [
                'id' => 4,
                'country_code' => 88,
                'name' =>'Bangladesh',
                'min_digits' => 8,
                'max_digits' =>10,
                'iso_code' => 'BD',
                'language' => 'bg'
                
            ]
        ]);
       
    }
}
