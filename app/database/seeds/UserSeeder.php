<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {
        
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
                $user = new User();
                
                $username = 'safat';
                $email = 'safat@gmail.com';
                $password = '1234';
                $user_type = User::USER_TYPE_ADMIN;
                $status = User::STATUS_ACTIVE;
                $registration_number = 'A-001';
                $phone_number = '01721234567';
                
                $user->createUser($username, $email, $password, $user_type, $status, $registration_number, $phone_number);
        }
        
}
