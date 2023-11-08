<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('123456789'),
                'phone'=>'1111111'
            ]
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($admins as $admin){
            Admin::create($admin);
        }
    }
}
