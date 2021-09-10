<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
                'name' => 'イベント１',
                'detail' => '就活についてのお話を少しします',
                'date' => date('Y-m-d'),
                'place' => '池袋パルコ',
                'people' => 30
            ],
            [
                'name' => 'イベント２',
                'detail' => 'おわらいとは',
                'date' => date('Y-m-d'),
                'place' => '池袋パルコ',
                'people' => 30
            ],
            [
                'name' => 'イベント３',
                'detail' => '引退します',
                'date' => date('Y-m-d'),
                'place' => '池袋パルコ',
                'people' => 30
            ],
        ];
        foreach ($dataSet as $data) {
            Event::show($data);
        }
}
}
