<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('countries')->insert([
            'ar_name' => 'المملكة العربية السعودية',
            'en_name' => 'Saudi Arabia',
        ]);

        DB::table('countries')->insert([
            'ar_name' => 'دولة أخرى',
            'en_name' => 'Other Country',
        ]);
    }
}
