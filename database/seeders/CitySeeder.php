<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name'=>'lucknow', 'state_id'=>1],
            ['name'=>'kanpur', 'state_id'=>1],
            ['name'=> 'gorakhpur', 'state_id'=>1],  
            ['name'=> 'kolkata', 'state_id'=>2],  
            ['name'=> 'silliguri', 'state_id'=>2],  
            ['name'=> 'darjeeling', 'state_id'=>2],  
            ['name'=> 'chennai', 'state_id'=>3],  
            ['name'=> 'salem', 'state_id'=>3],  
            ['name'=> 'madurai', 'state_id'=>3],  
            
        ];
        foreach ($cities as $key => $city) {
            City::create($city);
        }
    }
}
