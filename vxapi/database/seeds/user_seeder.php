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
        DB::table('users')->insert(
            [
                [
                    'username' => 'admin',
                    'name' => 'root',
                    'password' => Hash::make('admin'),
                    'qnumber' => json_encode(array('choose'=>0, 'mutichoose'=>1, 'fillBlank'=>2, 'judge'=>3))
                ]
            ]
        );
    }
}
