<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            // States for India
            ['country_id' => 1, 'name' => 'Andhra Pradesh'],
            ['country_id' => 1, 'name' => 'Assam'],

            // States for USA
            ['country_id' => 2, 'name' => 'California'],
            ['country_id' => 2, 'name' => 'New York'],

            // States for Canada
            ['country_id' => 3, 'name' => 'Ontario'],
            ['country_id' => 3, 'name' => 'Quebec'],

			// States for UK
            ['country_id' => 4, 'name' => 'England'],
            ['country_id' => 4, 'name' => 'Scotland'],
			
			// States for Australia
            ['country_id' => 5, 'name' => 'New South Wales'],
            ['country_id' => 5, 'name' => 'Queensland'],

        ];

        foreach ($states as $state) {
            DB::table('state')->insert([
                'country_id' => $state['country_id'],
                'name' => $state['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
