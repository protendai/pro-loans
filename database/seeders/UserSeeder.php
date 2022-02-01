<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     =>"tendai",
            'surname'  =>"karuma",
            'role'     =>"AD",
            'email'    =>"admin@gmail.com",
            'password' =>Hash::make('12345678'),
        ]);

        User::create([
            'name'     =>"Shamen",
            'surname'  =>"karuma",
            'role'     =>"LO",
            'email'    =>"officer@gmail.com",
            'password' =>Hash::make('12345678'),
        ]);

        User::create([
            'name'     =>"James",
            'surname'  =>"karuma",
            'role'     =>"CU",
            'email'    =>"customer@gmail.com",
            'password' =>Hash::make('12345678'),
        ]);
    }
}
