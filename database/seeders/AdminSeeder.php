<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'user_id' => 1,
                'name' => 'Raihan Farras',
                'slug' => 'raihan-farras',
                'phone' => '081333903187',
                'email' => 'rehanfarras76@gmail.com'
            ]
        ];

        foreach ($admins as $key => $value) {
            Admin::create($value);
        }
    }
}
