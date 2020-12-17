<?php

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
        DB::table('users')->insert(
            [
                [
                    'id' => 'US-1',
                    'name' => 'Ichsan',
                    'jabatan' => 'pemilik',
                    'email' => 'ichsan@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-12-17 09:45:24',
                ],[
                    'id' => 'US-2',
                    'name' => 'Luluk',
                    'jabatan' => 'pemilik',
                    'email' => 'luluk@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-12-17 09:45:25',
                ],
            ]
        );
    }
}
