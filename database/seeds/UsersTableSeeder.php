<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$levels = ['admin', 'teller', 'bendum'];
    	foreach ($levels as $name) {
	        DB::table('level')->insert([
	        	'name' => $name
	        ]);
    	}

    	DB::table('users')->insert([
    		'name' => 'Administrator',
    		'username' => 'admin',
    		'password' => bcrypt('admin'),
    		'level_id' => 1
    	]);

    	DB::table('users')->insert([
    		'name' => 'Teller 1',
    		'username' => 'teller1',
    		'password' => bcrypt('teller'),
    		'level_id' => 2
    	]);

    	DB::table('users')->insert([
    		'name' => 'Bendahara Umum',
    		'username' => 'bendum',
    		'password' => bcrypt('bendum'),
    		'level_id' => 3
    	]);
    }
}
