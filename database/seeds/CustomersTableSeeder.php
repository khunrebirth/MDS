<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 5;

        for ($i = 0; $i < $counter; $i++) {
            DB::table('customers')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'nickname' => Str::random(6),
                'idcard' => '1209300025120' . $i + 1,
                'phone' => '0891234560' . $i + 1,
                'email' => Str::random(10) . '@gmail.com',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
