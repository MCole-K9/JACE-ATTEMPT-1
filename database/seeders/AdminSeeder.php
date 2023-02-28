<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Test-Ann',
                'last_name' => 'Chin',
                'email' => 'chintestann@test.com',
                'password' => Hash::make('doeaskminuhstupidquestion'),
                'role_id' => 1
            ],
            [
                'first_name' => 'Tessitura',
                'last_name' => 'Testerson',
                'email' => 'testinyourpatience@test.com',
                'password' => Hash::make('jailbreakthetesla'),
                'role_id' => 1
            ],
            [
                'first_name' => 'Nicola',
                'last_name' => 'Tesla',
                'email' => 'fantasticsecretpowers@heywhatsgoing.on',
                'password' => Hash::make('BASERATTLESTARSOUTTHESKY'),
                'role_id' => 1
            ]
        ]);
    }
}
