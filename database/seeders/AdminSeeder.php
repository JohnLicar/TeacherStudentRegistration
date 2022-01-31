<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = new User();
        $admin->last_name = 'Admin';
        $admin->middle_name = 'Admin';
        $admin->first_name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->birthday = '2021-03-21';
        $admin->save();
        $admin->attachRole('admin');
    }
}
