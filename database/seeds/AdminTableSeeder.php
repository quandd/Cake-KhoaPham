<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	[
        		'email'=>'admin@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>1
        	],
        	[
        		'email'=>'quankiu@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>1
        	]
        ];
        DB::table('admins')->insert($data);
    }
}
