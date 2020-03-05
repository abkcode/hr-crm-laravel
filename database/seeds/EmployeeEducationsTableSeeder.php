<?php

use Illuminate\Database\Seeder;

class EmployeeEducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIDs = DB::table('users')->where('user_type', 2)->pluck('id')->toArray();
        foreach (range(10, 100) as $index) {
            $createdTime = time() - rand(10000, 360000);
            DB::table('employee_educations')->insert([
                'user_id' => Arr::random($userIDs),
                'school_name' => Str::random(10),
                'degree' => Str::random(10),
                'field_of_study' => Str::random(10),
                'start_month' => rand(1, 12),
                'start_year' => rand(2010, 2020),
                'grade' => Arr::random(['A','First Class','78%']),
                'created_at' => date("Y-m-d H:i:s", $createdTime),
                'updated_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
            ]);
        }
    }
}
