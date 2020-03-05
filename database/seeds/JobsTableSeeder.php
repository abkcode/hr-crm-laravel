<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
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
            $jobArr = [
                'title' => Str::random(10),
                'location' => Str::random(10),
                'experience' =>  rand(1,10),
                'created_at' => date("Y-m-d H:i:s", $createdTime),
                'updated_at' => Arr::random([null, date("Y-m-d H:i:s", $createdTime + rand(0, 10000))]),
            ];
            DB::table('jobs')->insert($jobArr);
        }
    }
}
