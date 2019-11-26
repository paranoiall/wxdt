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
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'answer' => 'a'
                ]
            ]
        );
    }
}
