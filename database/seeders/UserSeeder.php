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
            ],
            [
                'username' => 'ari123',
                'password' => bcrypt('ari123'),
                'level' => 'admin'
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
