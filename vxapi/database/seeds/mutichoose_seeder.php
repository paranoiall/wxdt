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
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => json_encode(array('a', 'b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => json_encode(array('a', 'b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => json_encode(array('a', 'b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => json_encode(array('a', 'b'))
                ],
                [
                    'question' => 'q',
                    'options' => json_encode(array(
                        array('key' => 'a', 'value' => 'qa'),
                        array('key' => 'b', 'value' => 'qb'),
                        array('key' => 'c', 'value' => 'qc'),
                        array('key' => 'd', 'value' => 'qd')
                    )),
                    'answer' => json_encode(array('a', 'b'))
                ]
            ]
        );
    }
}
