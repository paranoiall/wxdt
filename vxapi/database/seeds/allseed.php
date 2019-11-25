<?php

use Illuminate\Database\Seeder;

class allseed extends Seeder
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
        DB::table('fillblanks')->insert(
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
