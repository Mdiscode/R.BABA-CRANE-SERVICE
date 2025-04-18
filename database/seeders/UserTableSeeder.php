<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
         [
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>"admin@gmail.com",
            'password'=>Hash::make('123456'),
            'role'=>'admin',
            'status'=>'active'
         ],
        //  agent 
         [
            'name'=>'agent',
            'username'=>'agent',
            'email'=>"agent@gmail.com",
            'password'=>Hash::make('123456'),
            'role'=>'agent',
            'status'=>'active'
         ],
        //  user 
         [
            'name'=>'user',
            'username'=>'user',
            'email'=>"user@gmail.com",
            'password'=>Hash::make('123456'),
            'role'=>'user',
            'status'=>'active'
         ]
        ]);
    }
}
