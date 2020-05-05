<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $customers = [
                'id' => $i,
                'type' => $i%2==0 ? 'D' : 'C',
                'last_name' => 'User',
                'first_name' => $i,
                'last_name_kana' => 'ジェーソン' . $i,
                'first_name_kana' => 'スタサム' . $i,
                'email' => 'customer' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'birthdate' => Carbon::createFromDate(rand(1975, 2010), rand(1, 12), rand(1, 31), 'Asia/Ho_Chi_Minh'),
                'zipcode' => '70000',
                'prefecture_id' => rand(1, 47),
                'address' => '15' . $i . ' Dao Duy Anh Street, Ward 9, Phu Nhuan District, HCMC',
                'mobile_phone_number' => '077885123' . $i,
                'fixed_phone_number' => '077885124' . $i,
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ];
            array_push($data, $customers);
        }

        if (DB::table('customers')->count() == 0) {
            DB::table('customers')->insert($data);
        }
    }
}
