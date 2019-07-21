<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Iyngaran',
                'email' => 'dev@iyngaran.info',
                'password' => Hash::make('abc@123456')
            ],
            [
                'name' => 'Developer',
                'email' => 'dev@doamin.com',
                'password' => Hash::make('abc@123456')
            ]
        ];
        foreach($users As $user){
            User::create($user);
        }
    }
}
