<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	[
        		'name'='IPhone',
        		'status'=1,
        		'cat_slug'='IPhone'
        	],
        	[
        		'name'='Samsung',
        		'status'=1,
        		'cat_slug'='Samsung'
        	]
        ];
        DB::table('category')->insert($data);
    }
}
