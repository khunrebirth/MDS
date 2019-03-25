<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            'ค่าน้ำ' => 30,
            'ค่าไฟ' => 7,
            'ค่าเช่าห้อง' => 2500
        ];

        foreach ($accounts as $account => $price) {
            DB::table('accounts')->insert([
                'title' => $account,
                'price' => $price,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
