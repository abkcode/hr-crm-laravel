<?php

use Illuminate\Database\Seeder;

class EmployeeAppliedJobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIDs = DB::table('users')->where('user_type', 2)->pluck('id')->toArray();
        $jobIDs = DB::table('jobs')->pluck('id')->toArray();
        foreach (range(10, 100) as $index) {
            $createdTime = time() - rand(10000, 360000);
            DB::table('employee_applied_jobs')->insert([
                'user_id' => Arr::random($userIDs),
                'job_id' => Arr::random($jobIDs),
                'created_at' => date("Y-m-d H:i:s", $createdTime),
                'updated_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
            ]);
        }
    }
}
