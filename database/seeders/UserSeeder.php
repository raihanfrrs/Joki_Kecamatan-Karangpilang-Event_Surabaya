<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'raihan123',
                'password' => bcrypt('test123'),
                'level' => 'admin'
            ],
            [
                'username' => 'farras123',
                'password' => bcrypt('test123'),
                'level' => 'rukun warga'
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
