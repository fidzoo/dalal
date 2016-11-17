<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	'country_id' => 1,
            'ar_name' => 'الرياض',
            'en_name' => 'Riyadh',
        ]);

        DB::table('cities')->insert([
        	'country_id' => 1,
            'ar_name' => 'جدة',
            'en_name' => 'Jeddah',
        ]);

        DB::table('cities')->insert([
        	'country_id' => 2,
            'ar_name' => 'مدينة أخرى',
            'en_name' => 'Other City',
        ]);
    }
}
