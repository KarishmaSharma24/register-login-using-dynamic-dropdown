<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['name'=>'uttar predesh'],
            ['name'=>'west bangal'],
            ['name'=> 'tamil nadu'],    
          
        ];
        foreach ($states as $key => $state) {
            State::create($state);
        }
    }
}
