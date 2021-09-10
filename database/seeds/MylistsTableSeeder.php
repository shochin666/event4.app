<?php

use Illuminate\Database\Seeder;
use App\Models\Mylist;

class MylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'user_id' => 1,
                'event_id' => 1,
            ],
            [
                'user_id' => 1,
                'event_id' => 2,
            ],
            [
                'user_id' => 2,
                'event_id' => 3,
            ],            [
                'user_id' => 2,
                'event_id' => 2,
            ],
        ];
        foreach ($dataSet as $data) {
            Mylist::create($data);
        }
    }
}
