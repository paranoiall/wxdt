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
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => 'a',
                    'totalnum' => 0,
                    'rightnum' => 0
                ]
            ]
        );
    }
}
