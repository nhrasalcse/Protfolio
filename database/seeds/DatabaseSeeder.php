<?php

use App\User;
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
        User::create([

            'name'=>'Admin',
            'email'=>'admin@dashboard.com',
            'phone'=>'01853195548',
            'present_address'=>'172/2 Doctor goli, Mogbazar Dhaka-1217',
            'permanent_address'=>'Aynatoli Shahrasti Chandpur-3622',
            'password'=>Hash::make('12345678'),
            'role_id'=>'1',
			'status'=>'1',
        ]);
    }
}
