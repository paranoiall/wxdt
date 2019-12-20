<?php

use Illuminate\Database\Seeder;

class fillBlank_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fill_blanks')->insert(
            [
                [
                    'question' => 'q',
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ]
            ]
        );
    }
}
