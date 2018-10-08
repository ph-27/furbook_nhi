<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
			['id' => 1, 'name' => 'Mèo Ba Tư'],
			['id' => 2, 'name' => 'Mèo Mỹ'],
			['id' => 3, 'name' => 'Mèo Rừng']        		
        ]);
    }
}
