<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call('UserSeeder');
       $this->call('CategoryTableSeeder');
    }
}
class UserSeeder extends Seeder
{
     public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(UserdataTableSeeder::class);
         $data=[
             [
                'email'=>'manhtien@gmail.com',
                'password'=>bcrypt('123'),
                'level'=>1,
             ],
             [
                'email'=>'manhtien@gmail.com',
                'password'=>bcrypt('123'),
                'level'=>2,
             ],
        ];
        DB::table('user')->insert($data);
    }
}
class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'name'=>'IPhone',
                'status'=>1,
                'cat_slug'=>'IPhone',
            ],
            [
                'name'=>'Samsung',
                'status'=>1,
                'cat_slug'=>'Samsung',
            ]
        ];
        DB::table('category')->insert($data);
    }
}