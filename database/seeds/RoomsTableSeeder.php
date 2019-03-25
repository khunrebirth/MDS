<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 20;

        for ($i = 0; $i < $counter; $i++) {
            DB::table('rooms')->insert([
                'no' => 1000 + $i,
                'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'price' => 2500,
                'status' => 0,
                'room_type_id' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
