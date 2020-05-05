<?php

use Illuminate\Database\Seeder;

class MakersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('makers')->delete();
        
        \DB::table('makers')->insert(array (
            0 => 
            array (
                'id' => 210,
                'name' => 'ＧＭＣ',
                'created_at' => '2020-01-06 15:42:00',
                'updated_at' => '2020-01-06 15:42:00',
                'icon_image' => ''
            ),
            1 => 
            array (
                'id' => 211,
                'name' => 'キャデラック',
                'created_at' => '2020-01-06 15:42:00',
                'updated_at' => '2020-01-06 15:42:00',
                'icon_image' => ''
            ),
            2 => 
            array (
                'id' => 212,
                'name' => 'サターン',
                'created_at' => '2020-01-06 15:42:49',
                'updated_at' => '2020-01-06 15:42:49',
                'icon_image' => ''
            ),
            3 => 
            array (
                'id' => 213,
                'name' => 'シボレー',
                'created_at' => '2020-01-06 15:42:49',
                'updated_at' => '2020-01-06 15:42:49',
                'icon_image' => ''
            ),
            4 => 
            array (
                'id' => 214,
                'name' => 'ハマー',
                'created_at' => '2020-01-06 15:43:41',
                'updated_at' => '2020-01-06 15:43:41',
                'icon_image' => ''
            ),
            5 => 
            array (
                'id' => 215,
                'name' => 'ビュイック',
                'created_at' => '2020-01-06 15:43:41',
                'updated_at' => '2020-01-06 15:43:41',
                'icon_image' => ''
            ),
            6 => 
            array (
                'id' => 216,
                'name' => 'ポンテアック',
                'created_at' => '2020-01-06 15:44:08',
                'updated_at' => '2020-01-06 15:44:08',
                'icon_image' => ''
            ),
            7 => 
            array (
                'id' => 220,
                'name' => 'フォード',
                'created_at' => '2020-01-06 15:44:08',
                'updated_at' => '2020-01-06 15:44:08',
                'icon_image' => ''
            ),
            8 => 
            array (
                'id' => 221,
                'name' => 'マーキュリー',
                'created_at' => '2020-01-06 15:44:54',
                'updated_at' => '2020-01-06 15:44:54',
                'icon_image' => ''
            ),
            9 => 
            array (
                'id' => 222,
                'name' => 'リンカーン',
                'created_at' => '2020-01-06 15:44:54',
                'updated_at' => '2020-01-06 15:44:54',
                'icon_image' => ''
            ),
            10 => 
            array (
                'id' => 230,
                'name' => 'クライスラー',
                'created_at' => '2020-01-06 15:45:23',
                'updated_at' => '2020-01-06 15:45:23',
                'icon_image' => ''
            ),
            11 => 
            array (
                'id' => 231,
                'name' => 'ジープ',
                'created_at' => '2020-01-06 15:45:23',
                'updated_at' => '2020-01-06 15:45:23',
                'icon_image' => 'brand_jeep.jpg'
            ),
            12 => 
            array (
                'id' => 232,
                'name' => 'ダッジ',
                'created_at' => '2020-01-06 15:46:15',
                'updated_at' => '2020-01-06 15:46:15',
                'icon_image' => ''
            ),
            13 => 
            array (
                'id' => 299,
                'name' => 'アメリカその他',
                'created_at' => '2020-01-06 15:46:15',
                'updated_at' => '2020-01-06 15:46:15',
                'icon_image' => ''
            ),
            14 => 
            array (
                'id' => 310,
                'name' => 'ＡＭＧ',
                'created_at' => '2020-01-06 15:46:34',
                'updated_at' => '2020-01-06 15:46:34',
                'icon_image' => ''
            ),
            15 => 
            array (
                'id' => 311,
                'name' => 'ＭＣＣ',
                'created_at' => '2020-01-06 15:46:34',
                'updated_at' => '2020-01-06 15:46:34',
                'icon_image' => ''
            ),
            16 => 
            array (
                'id' => 312,
                'name' => 'ブラバス',
                'created_at' => '2020-01-06 15:46:56',
                'updated_at' => '2020-01-06 15:46:56',
                'icon_image' => ''
            ),
            17 => 
            array (
                'id' => 313,
                'name' => 'マイバッハ',
                'created_at' => '2020-01-06 15:46:56',
                'updated_at' => '2020-01-06 15:46:56',
                'icon_image' => ''
            ),
            18 => 
            array (
                'id' => 314,
                'name' => 'メルセデスベンツ',
                'created_at' => '2020-01-06 15:47:19',
                'updated_at' => '2020-01-06 15:47:19',
                'icon_image' => 'brand_mercedes.jpg'
            ),
            19 => 
            array (
                'id' => 320,
                'name' => 'ＢＭＷ',
                'created_at' => '2020-01-06 15:47:19',
                'updated_at' => '2020-01-06 15:47:19',
                'icon_image' => 'brand_bmw.jpg'
            ),
            20 => 
            array (
                'id' => 321,
                'name' => 'アルピナ',
                'created_at' => '2020-01-06 15:48:41',
                'updated_at' => '2020-01-06 15:48:41',
                'icon_image' => ''
            ),
            21 => 
            array (
                'id' => 330,
                'name' => 'ポルシェ',
                'created_at' => '2020-01-06 15:48:41',
                'updated_at' => '2020-01-06 15:48:41',
                'icon_image' => 'brand_porsche.jpg'
            ),
            22 => 
            array (
                'id' => 340,
                'name' => 'アウディ',
                'created_at' => '2020-01-06 15:49:00',
                'updated_at' => '2020-01-06 15:49:00',
                'icon_image' => 'brand_audi.jpg'
            ),
            23 => 
            array (
                'id' => 350,
                'name' => 'フォルクスワーゲン',
                'created_at' => '2020-01-06 15:49:00',
                'updated_at' => '2020-01-06 15:49:00',
                'icon_image' => 'brand_vw.jpg'
            ),
            24 => 
            array (
                'id' => 360,
                'name' => 'オペル',
                'created_at' => '2020-01-06 15:49:22',
                'updated_at' => '2020-01-06 15:49:22',
                'icon_image' => ''
            ),
            25 => 
            array (
                'id' => 370,
                'name' => 'アルテガ',
                'created_at' => '2020-01-06 15:49:22',
                'updated_at' => '2020-01-06 15:49:22',
                'icon_image' => ''
            ),
            26 => 
            array (
                'id' => 410,
                'name' => 'ジャガー',
                'created_at' => '2020-01-06 15:49:48',
                'updated_at' => '2020-01-06 15:49:48',
                'icon_image' => 'brand_jaguar.jpg'
            ),
            27 => 
            array (
                'id' => 411,
                'name' => 'ダイムラー',
                'created_at' => '2020-01-06 15:49:48',
                'updated_at' => '2020-01-06 15:49:48',
                'icon_image' => ''
            ),
            28 => 
            array (
                'id' => 420,
                'name' => 'ローバー',
                'created_at' => '2020-01-06 15:50:28',
                'updated_at' => '2020-01-06 15:50:28',
                'icon_image' => 'brand_landrover.jpg'
            ),
            29 => 
            array (
                'id' => 430,
                'name' => 'ベントレー',
                'created_at' => '2020-01-06 15:50:28',
                'updated_at' => '2020-01-06 15:50:28',
                'icon_image' => 'brand_bentley.jpg'
            ),
            30 => 
            array (
                'id' => 431,
                'name' => 'ロールスロイス',
                'created_at' => '2020-01-06 15:50:47',
                'updated_at' => '2020-01-06 15:50:47',
                'icon_image' => ''
            ),
            31 => 
            array (
                'id' => 440,
                'name' => 'アストンマーティン',
                'created_at' => '2020-01-06 15:50:47',
                'updated_at' => '2020-01-06 15:50:47',
                'icon_image' => 'brand_astonmartin.jpg'
            ),
            32 => 
            array (
                'id' => 450,
                'name' => 'ロータス',
                'created_at' => '2020-01-06 15:51:08',
                'updated_at' => '2020-01-06 15:51:08',
                'icon_image' => ''
            ),
            33 => 
            array (
                'id' => 460,
                'name' => 'ＴＶＲ',
                'created_at' => '2020-01-06 15:51:08',
                'updated_at' => '2020-01-06 15:51:08',
                'icon_image' => ''
            ),
            34 => 
            array (
                'id' => 481,
                'name' => 'モーク',
                'created_at' => '2020-01-06 15:51:34',
                'updated_at' => '2020-01-06 15:51:34',
                'icon_image' => ''
            ),
            35 => 
            array (
                'id' => 482,
                'name' => 'マクラーレン',
                'created_at' => '2020-01-06 15:51:34',
                'updated_at' => '2020-01-06 15:51:34',
                'icon_image' => ''
            ),
            36 => 
            array (
                'id' => 499,
                'name' => 'イギリスその他',
                'created_at' => '2020-01-06 15:51:58',
                'updated_at' => '2020-01-06 15:51:58',
                'icon_image' => ''
            ),
            37 => 
            array (
                'id' => 510,
                'name' => 'フェラーリ',
                'created_at' => '2020-01-06 15:51:58',
                'updated_at' => '2020-01-06 15:51:58',
                'icon_image' => 'brand_ferrari.jpg'
            ),
            38 => 
            array (
                'id' => 520,
                'name' => 'アルファロメオ',
                'created_at' => '2020-01-06 15:52:25',
                'updated_at' => '2020-01-06 15:52:25',
                'icon_image' => 'brand_alfaromeo.jpg'
            ),
            39 => 
            array (
                'id' => 530,
                'name' => 'フィアット',
                'created_at' => '2020-01-06 15:52:25',
                'updated_at' => '2020-01-06 15:52:25',
                'icon_image' => 'brand_fiat.jpg'
            ),
            40 => 
            array (
                'id' => 540,
                'name' => 'マセラティ',
                'created_at' => '2020-01-06 15:52:44',
                'updated_at' => '2020-01-06 15:52:44',
                'icon_image' => 'brand_maserati.jpg'
            ),
            41 => 
            array (
                'id' => 550,
                'name' => 'ランチア',
                'created_at' => '2020-01-06 15:52:44',
                'updated_at' => '2020-01-06 15:52:44',
                'icon_image' => ''
            ),
            42 => 
            array (
                'id' => 560,
                'name' => 'ランボルギーニ',
                'created_at' => '2020-01-06 15:53:10',
                'updated_at' => '2020-01-06 15:53:10',
                'icon_image' => 'brand_lamborghini.jpg'
            ),
            43 => 
            array (
                'id' => 570,
                'name' => 'アウトビアンキ',
                'created_at' => '2020-01-06 15:53:10',
                'updated_at' => '2020-01-06 15:53:10',
                'icon_image' => ''
            ),
            44 => 
            array (
                'id' => 580,
                'name' => 'デトマソ',
                'created_at' => '2020-01-06 15:53:37',
                'updated_at' => '2020-01-06 15:53:37',
                'icon_image' => ''
            ),
            45 => 
            array (
                'id' => 610,
                'name' => 'シトロエン',
                'created_at' => '2020-01-06 15:53:37',
                'updated_at' => '2020-01-06 15:53:37',
                'icon_image' => ''
            ),
            46 => 
            array (
                'id' => 620,
                'name' => 'プジョー',
                'created_at' => '2020-01-06 15:53:57',
                'updated_at' => '2020-01-06 15:53:57',
                'icon_image' => ''
            ),
            47 => 
            array (
                'id' => 630,
                'name' => 'ルノー',
                'created_at' => '2020-01-06 15:53:57',
                'updated_at' => '2020-01-06 15:53:57',
                'icon_image' => ''
            ),
            48 => 
            array (
                'id' => 640,
                'name' => 'ブガッティ',
                'created_at' => '2020-01-06 15:54:16',
                'updated_at' => '2020-01-06 15:54:16',
                'icon_image' => ''
            ),
            49 => 
            array (
                'id' => 710,
                'name' => 'ボルボ',
                'created_at' => '2020-01-06 15:54:16',
                'updated_at' => '2020-01-06 15:54:16',
                'icon_image' => 'brand_volvo.jpg'
            ),
            50 => 
            array (
                'id' => 720,
                'name' => 'サーブ',
                'created_at' => '2020-01-06 15:54:38',
                'updated_at' => '2020-01-06 15:54:38',
                'icon_image' => ''
            ),
            51 => 
            array (
                'id' => 810,
                'name' => 'ヒュンダイ',
                'created_at' => '2020-01-06 15:54:38',
                'updated_at' => '2020-01-06 15:54:38',
                'icon_image' => ''
            ),
            52 => 
            array (
                'id' => 820,
                'name' => 'サンヨン',
                'created_at' => '2020-01-06 15:54:57',
                'updated_at' => '2020-01-06 15:54:57',
                'icon_image' => ''
            ),
            53 => 
            array (
                'id' => 830,
                'name' => 'デーウ＆ＧＭＤＡＴ',
                'created_at' => '2020-01-06 15:54:57',
                'updated_at' => '2020-01-06 15:54:57',
                'icon_image' => ''
            ),
            54 => 
            array (
                'id' => 840,
                'name' => 'キア',
                'created_at' => '2020-01-06 15:55:08',
                'updated_at' => '2020-01-06 15:55:08',
                'icon_image' => ''
            )
        ));
        
        
    }
}