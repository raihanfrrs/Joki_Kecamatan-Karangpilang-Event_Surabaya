<?php

namespace Database\Seeders;

use App\Models\RukunWarga;
use Illuminate\Database\Seeder;

class RukunWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rukun_wargas = [
            [
                'user_id' => 2,
                'name' => 'Farras Raihan',
                'slug' => 'farras-raihan',
                'phone' => '081333903187',
                'email' => 'raihanfarras76@gmail.com'
            ]
        ];

        foreach ($rukun_wargas as $key => $value) {
            RukunWarga::create($value);
        }
    }
}
