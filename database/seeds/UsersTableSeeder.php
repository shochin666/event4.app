<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
                    'name' => 'tom',
                    'email' => 'tom@example.com',
                    'password' => 'password'
                ],
                [
                    'name' => 'john',
                    'email' => 'john@example.com',
                    'password' => 'password2'
                ],
            ];

        foreach($dataSet as $data) {
            User::create($data);
        }

    }
}