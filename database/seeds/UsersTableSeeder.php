<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(100, 200) as $index) {
            $createdTime = time() - rand(10000, 360000);
            $userArr = [
                'fname' => Str::random(10),
                'lname' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'email_verified_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
                'password' => Hash::make('password'),
                'phone_code' => Arr::random([1, 91]),
                'phone_number' => rand(100000, 999999999),
                'last_login' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
                'user_type' =>  rand(1,2),
                'profile_pic' => Str::random(10) . '.png',
                'gender' => Arr::random(['male', 'female']),
                'timezone' => Arr::random(timezone_identifiers_list()),
                // 'remember_token' => Str::random(10),
                'created_at' => date("Y-m-d H:i:s", $createdTime),
                'updated_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
            ];
            DB::table('users')->insert($userArr);
        }
    }
}
