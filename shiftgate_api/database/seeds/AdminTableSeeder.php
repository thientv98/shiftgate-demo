<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        $data = [
            [
                'last_name' => 'Super',
                'first_name' => 'Admin',
                'last_name_kana' => 'スーパー',
                'first_name_kana' => 'アドミン',
                'email' => 'admin@shift-gate.co.jp',
                'password' => bcrypt('iK75pxUJ'),
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ];

        if(DB::table('admins')->count() == 0) {
            DB::table('admins')->insert($data);
        }
    }
}
