<?php

use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('prefectures')->delete();
        
        \DB::table('prefectures')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '北海道',
                'created_at' => '2020-01-06 15:28:45',
                'updated_at' => '2020-01-06 15:28:45',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '青森県',
                'created_at' => '2020-01-06 15:29:08',
                'updated_at' => '2020-01-06 15:29:08',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '岩手県',
                'created_at' => '2020-01-06 15:29:08',
                'updated_at' => '2020-01-06 15:29:08',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '宮城県',
                'created_at' => '2020-01-06 15:29:30',
                'updated_at' => '2020-01-06 15:29:30',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '秋田県',
                'created_at' => '2020-01-06 15:29:50',
                'updated_at' => '2020-01-06 15:29:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '山形県',
                'created_at' => '2020-01-06 15:29:50',
                'updated_at' => '2020-01-06 15:29:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '福島県',
                'created_at' => '2020-01-06 15:30:09',
                'updated_at' => '2020-01-06 15:30:09',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '茨城県',
                'created_at' => '2020-01-06 15:30:09',
                'updated_at' => '2020-01-06 15:30:09',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '栃木県',
                'created_at' => '2020-01-06 15:30:38',
                'updated_at' => '2020-01-06 15:30:38',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '群馬県',
                'created_at' => '2020-01-06 15:30:38',
                'updated_at' => '2020-01-06 15:30:38',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '埼玉県',
                'created_at' => '2020-01-06 15:30:55',
                'updated_at' => '2020-01-06 15:30:55',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '千葉県',
                'created_at' => '2020-01-06 15:30:55',
                'updated_at' => '2020-01-06 15:30:55',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '東京都',
                'created_at' => '2020-01-06 15:31:11',
                'updated_at' => '2020-01-06 15:31:11',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '神奈川県',
                'created_at' => '2020-01-06 15:31:11',
                'updated_at' => '2020-01-06 15:31:11',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '新潟県',
                'created_at' => '2020-01-06 15:31:27',
                'updated_at' => '2020-01-06 15:31:27',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '富山県',
                'created_at' => '2020-01-06 15:31:27',
                'updated_at' => '2020-01-06 15:31:27',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '石川県',
                'created_at' => '2020-01-06 15:31:47',
                'updated_at' => '2020-01-06 15:31:47',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '福井県',
                'created_at' => '2020-01-06 15:31:47',
                'updated_at' => '2020-01-06 15:31:47',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '山梨県',
                'created_at' => '2020-01-06 15:32:08',
                'updated_at' => '2020-01-06 16:22:45',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '長野県',
                'created_at' => '2020-01-06 15:32:08',
                'updated_at' => '2020-01-06 15:32:08',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '岐阜県',
                'created_at' => '2020-01-06 15:32:25',
                'updated_at' => '2020-01-06 15:32:25',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '静岡県',
                'created_at' => '2020-01-06 15:32:25',
                'updated_at' => '2020-01-06 15:32:25',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '愛知県',
                'created_at' => '2020-01-06 15:32:40',
                'updated_at' => '2020-01-06 15:32:40',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '三重県',
                'created_at' => '2020-01-06 15:32:40',
                'updated_at' => '2020-01-06 15:32:40',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '滋賀県',
                'created_at' => '2020-01-06 15:33:01',
                'updated_at' => '2020-01-06 15:33:01',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '京都府',
                'created_at' => '2020-01-06 15:33:01',
                'updated_at' => '2020-01-06 15:33:01',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '大阪府',
                'created_at' => '2020-01-06 15:33:21',
                'updated_at' => '2020-01-06 15:33:21',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '兵庫県',
                'created_at' => '2020-01-06 15:33:21',
                'updated_at' => '2020-01-06 15:33:21',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '奈良県',
                'created_at' => '2020-01-06 15:37:27',
                'updated_at' => '2020-01-06 15:37:27',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '和歌山県1',
                'created_at' => '2020-01-06 15:37:27',
                'updated_at' => '2020-01-06 15:37:27',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '鳥取県',
                'created_at' => '2020-01-06 15:37:43',
                'updated_at' => '2020-01-06 15:37:43',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '島根県',
                'created_at' => '2020-01-06 15:37:43',
                'updated_at' => '2020-01-06 15:37:43',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => '岡山県',
                'created_at' => '2020-01-06 15:38:05',
                'updated_at' => '2020-01-06 15:38:05',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => '広島県',
                'created_at' => '2020-01-06 15:38:05',
                'updated_at' => '2020-01-06 15:38:05',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => '山口県',
                'created_at' => '2020-01-06 15:38:39',
                'updated_at' => '2020-01-06 15:38:39',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => '徳島県',
                'created_at' => '2020-01-06 15:38:39',
                'updated_at' => '2020-01-06 15:38:39',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => '香川県',
                'created_at' => '2020-01-06 15:39:01',
                'updated_at' => '2020-01-06 15:39:01',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => '愛媛県',
                'created_at' => '2020-01-06 15:39:01',
                'updated_at' => '2020-01-06 15:39:01',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => '高知県',
                'created_at' => '2020-01-06 15:39:26',
                'updated_at' => '2020-01-06 15:39:26',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => '福岡県',
                'created_at' => '2020-01-06 15:39:26',
                'updated_at' => '2020-01-06 15:39:26',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => '佐賀県',
                'created_at' => '2020-01-06 15:39:51',
                'updated_at' => '2020-01-06 15:39:51',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => '長崎県',
                'created_at' => '2020-01-06 15:39:51',
                'updated_at' => '2020-01-06 15:39:51',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => '熊本県',
                'created_at' => '2020-01-06 15:40:09',
                'updated_at' => '2020-01-06 15:40:09',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => '大分県',
                'created_at' => '2020-01-06 15:40:09',
                'updated_at' => '2020-01-06 15:40:09',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => '宮崎県',
                'created_at' => '2020-01-06 15:40:28',
                'updated_at' => '2020-01-06 15:40:28',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => '鹿児島県',
                'created_at' => '2020-01-06 15:40:28',
                'updated_at' => '2020-01-06 15:40:28',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => '沖縄県',
                'created_at' => '2020-01-06 15:40:48',
                'updated_at' => '2020-01-06 15:40:48',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}