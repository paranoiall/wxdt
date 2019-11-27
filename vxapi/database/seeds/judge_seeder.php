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
                    'options' => json_encode(array(0, 1)),
                    'answer' => 1,
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(0, 1)),
                    'answer' => 1,
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(0, 1)),
                    'answer' => 1,
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(0, 1)),
                    'answer' => 1,
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(0, 1)),
                    'answer' => 1,
                ]
            ]
        );
    }
}
