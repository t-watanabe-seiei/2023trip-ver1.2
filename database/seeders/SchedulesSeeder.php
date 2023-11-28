<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('schedules')->insert([
        [ 'caption' => '集合場所20' , 'detail' => '新山口駅19:55' , 'datetime' => '2009-08-24 23:10:15','image1' => 'https://seiei.ac.jp/blog/wp-content/uploads/2023/07/%E8%AA%BF%E7%90%86-2048x1536.jpg' , 'file1' => 'https://seiei.ac.jp/pdf/seiei_guide2021.pdf' ,],
        [ 'caption' => '新幹線に乗車20' , 'detail' => '23:15発のぞみ', 'datetime' => '2019-09-24 23:10:15','image1' => 'https://seiei.ac.jp/blog/wp-content/uploads/2023/07/%E5%B7%A5%E6%A5%AD-2048x1213.jpg' , 'file1' => 'https://seiei.ac.jp/pdf/certificate_application.pdf' ,],
      ]);
    }
}
