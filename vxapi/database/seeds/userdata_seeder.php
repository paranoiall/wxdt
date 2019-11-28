<?php

use Illuminate\Database\Seeder;

class userdata_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userdatas')->insert(
            [
                [
                    'userid' => 'test'
                ]
            ]
        );
    }
}
