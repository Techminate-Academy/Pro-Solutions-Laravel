<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'name' => 'Electric',
            'category_id' => '1',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Acoustic',
            'category_id' => '1',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Freatless',
            'category_id' => '2',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sub_categories')->insert([
            'name' => 'Electric',
            'category_id' => '2',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
