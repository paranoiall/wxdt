<?php

use Illuminate\Database\Seeder;

class choose_seeder extends Seeder
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
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => 'a'
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => 'a'
                ]
            ]
        );
    }
}
