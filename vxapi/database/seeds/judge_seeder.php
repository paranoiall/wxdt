<?php

use Illuminate\Database\Seeder;

class judge_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('judges')->insert(
            [
                [
                    'question' => 'q',
                    'answer' => true,
                ],
                [
                    'question' => 'q',
                    'answer' => true,
                ],
                [
                    'question' => 'q',
                    'answer' => true,
                ],
                [
                    'question' => 'q',
                    'answer' => true,
                ],
                [
                    'question' => 'q',
                    'answer' => true,
                ]
            ]
        );
    }
}
