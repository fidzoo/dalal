<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'ar_title' => 'ملابس رجال',
            'en_title' => 'Men’s Clothing',
            'active'    => 1,
        ]);

        DB::table('sections')->insert([
            'ar_title' => 'هواتف وساعات',
            'en_title' => 'Phones & Accessories',
            'active'    => 1,
        ]);

        //------------------------------------
        DB::table('main_categories')->insert([
            'section_id' => '1',
            'active' => '1',
            'ar_title' => 'علوي',
            'en_title' => 'Tops',
        ]);

        DB::table('main_categories')->insert([
            'section_id' => '1',
            'active' => '1',
            'ar_title' => 'سفلي',
            'en_title' => 'Bottoms',
        ]);

        DB::table('main_categories')->insert([
            'section_id' => '2',
            'active' => '1',
            'ar_title' => 'هواتف',
            'en_title' => 'Phones',
        ]);

        DB::table('main_categories')->insert([
            'section_id' => '2',
            'active' => '1',
            'ar_title' => 'ساعات',
            'en_title' => 'Watches',
        ]);

        //-----------------------------------
        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'قمصان',
            'en_title' => 'Shirts',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'هوودي',
            'en_title' => 'Hoodies',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'بناطيل',
            'en_title' => 'Pants',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'جينز',
            'en_title' => 'Jeans',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'نوكيا',
            'en_title' => 'Nokia',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'سامسونج',
            'en_title' => 'Samsung',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'رولكس',
            'en_title' => 'Rolex',
        ]);

        DB::table('sub_categories')->insert([
            'active' => '1',
            'ar_title' => 'بنطال-ساعة',
            'en_title' => 'Pant-Watch',
        ]);

        //-------------------------------------
        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '1',
            'sub_category_id' => '1',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '1',
            'sub_category_id' => '2',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '2',
            'sub_category_id' => '3',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '2',
            'sub_category_id' => '4',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '3',
            'sub_category_id' => '5',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '3',
            'sub_category_id' => '6',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '4',
            'sub_category_id' => '7',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '2',
            'sub_category_id' => '8',
        ]);

        DB::table('main_category_sub_category')->insert([
            'main_category_id' => '4',
            'sub_category_id' => '8',
        ]);
    }
}
