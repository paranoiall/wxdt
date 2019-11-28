<?php

use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chooses')->insert(
            [
                [
                'username' => 'admin',
                'name' => 'root',
                'password' => 'admin'
                ]
            ]
        );
    }
}
