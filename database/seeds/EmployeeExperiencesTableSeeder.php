<?php

use Illuminate\Database\Seeder;

class EmployeeExperiencesTableSeeder extends Seeder
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
            DB::table('employee_experiences')->insert([
                'user_id' => Arr::random($userIDs),
                'title' => Str::random(10),
                'employment_type' => rand(1, 7),
                'company_name' => Str::random(10),
                'location' => Str::random(10),
                'currently_working' => rand(0, 1),
                'start_month' => rand(1, 12),
                'start_year' => rand(2010, 2020),
                'end_month' => rand(1, 12),
                'end_year' => rand(2010, 2020),
                'created_at' => date("Y-m-d H:i:s", $createdTime),
                'updated_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
            ]);
        }
    }
}
