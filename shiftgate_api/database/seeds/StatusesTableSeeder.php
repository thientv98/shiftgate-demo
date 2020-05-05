<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'code' => '101',
                'name' => '未公開',
                'created_at' => '2020-01-06 15:22:51',
                'updated_at' => '2020-01-06 15:27:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'code' => '201',
                'name' => '公開中',
                'created_at' => '2020-01-06 15:27:45',
                'updated_at' => '2020-01-06 15:27:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'code' => '301',
                'name' => '公開終了',
                'created_at' => '2020-01-06 15:28:14',
                'updated_at' => '2020-01-06 15:28:14',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'code' => '901',
                'name' => '公開停止',
                'created_at' => '2020-01-06 15:28:14',
                'updated_at' => '2020-01-06 15:28:14',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}