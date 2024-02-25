<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // Cities for Andhra Pradesh, India
            ['state_id' => 1, 'name' => 'Visakhapatnam'],
            ['state_id' => 1, 'name' => 'Vijayawada'],
			// Cities for Assam, India
            ['state_id' => 2, 'name' => 'Guwahati'],
            ['state_id' => 2, 'name' => 'Nagaon'],


            // Cities for California, USA
            ['state_id' => 3, 'name' => 'Los Angeles'],
            ['state_id' => 3, 'name' => 'San Francisco'],
			// Cities for New York, USA
            ['state_id' => 4, 'name' => 'Staten Island'],
            ['state_id' => 4, 'name' => 'Yonkers'],


            // Cities for Ontario, Canada
            ['state_id' => 5, 'name' => 'Toronto'],
            ['state_id' => 5, 'name' => 'Ottawa'],
			// Cities for Quebec, Canada
            ['state_id' => 6, 'name' => 'Montreal'],
            ['state_id' => 6, 'name' => 'Gatineau'],
			
			
			// Cities for England, UK
            ['state_id' => 7, 'name' => 'Bristol'],
            ['state_id' => 7, 'name' => 'York'],
			// Cities for Scotland, UK
            ['state_id' => 8, 'name' => 'Perth'],
            ['state_id' => 8, 'name' => 'Dunfermline'],
			
			
			// Cities for New South Wales, Australia
            ['state_id' => 9, 'name' => 'Sydney'],
            ['state_id' => 9, 'name' => 'Newcastle'],
			// Cities for Queensland, Australia
            ['state_id' => 10, 'name' => 'Mackay'],
            ['state_id' => 10, 'name' => 'Cairns'],


        ];

        foreach ($cities as $city) {
            DB::table('city')->insert([
                'state_id' => $city['state_id'],
                'name' => $city['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
