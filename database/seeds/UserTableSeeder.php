<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@123.com',
            'password' => bcrypt('admin888'),
            'last_login_ip' => '127.0.0.1',
            'last_login_time'=>date('Y-m-d H:i:s',time())
        ]);
    }
}
