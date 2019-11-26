<?php

use Illuminate\Database\Seeder;

class mutichoose_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mutichooses')->insert(
            [
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => json_encode(array('a','b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => json_encode(array('a','b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => json_encode(array('a','b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => json_encode(array('a','b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array('a' => 'qa', 'b' => 'qb', 'c' => 'qc', 'd' => 'qd')),
                    'answer' => json_encode(array('a','b'))
                ]
            ]
        );
    }
}
