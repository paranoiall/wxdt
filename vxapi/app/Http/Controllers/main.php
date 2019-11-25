<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Fillblank;
use App\Models\Judge;
use App\Models\Mutichoose;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Schema;

class main extends Controller
{
    public function login(Userdata $userdata, $code)
    {
        $userid = $code;
        $data = [
            'userid' => $userid
        ];
        $userdata->create($data);
        return $userid;
    }

    public function question(Choose $choose, Mutichoose $mutichoose, Fillblank $fillblank, Judge $judge, Userdata $userdata, $userid)
    {
        $question_number = array(
            'choose' => json_encode($this->question_number()),
            'mutichoose' => json_encode($this->question_number()),
            'fillblank' => json_encode($this->question_number()),
            'judge' => json_encode($this->question_number())
        );
        $userdata->where('userid', $userid)->update($question_number);

        foreach ($question_number as $key => $value) {
            $value = json_decode($value, true);
            eval('$which=$' . $key . ';');
            foreach ($value as $q_number => $q_id) {
                if (Schema::hasColumn($key . 's', 'options')) {
                    $data[$key][$q_number] = $which
                        ->select('question', 'options')
                        ->where('id', $q_id)
                        ->get()
                        ->toArray()[0];
                } else {
                    $data[$key][$q_number] = $which
                        ->select('question')
                        ->where('id', $q_id)
                        ->get()
                        ->toArray()[0];
                }
            }
        }
        return json_encode($data);
    }

    public function answer(Choose $choose, Mutichoose $mutichoose, Fillblank $fillblank, Judge $judge, Userdata $userdata, $userid)
    {
//        $answer['choose'] = $_POST['choose'];
//        $answer['mutichoose'] = $_POST['mutichoose'];
//        $answer['fillblank'] = $_POST['fillblank'];
//        $answer['judge'] = $_POST['judge'];
//        dump($answer);
        $question_number = $userdata
            ->select('choose', 'mutichoose', 'fillblank', 'judge')
            ->where('userid', $userid)
            ->get()
            ->toArray()[0];
//        dump($question_number);
        foreach ($question_number as $key => $value) {
            $value = json_decode($value, true);
            eval('$which=$' . $key . ';');
            foreach ($value as $q_number => $q_id) {
                $question_answer[$key][$q_number] = $which
                    ->select('answer')
                    ->where('id', $q_id)
                    ->get()
                    ->toArray()[0]['answer'];
            }
        }

        $score_std = array('choose' => 1,
            'mutichoose' => 2,
            'fillblank' => 3,
            'judge' => 1
        );
        $score = 0;
        foreach ($question_answer as $key => $value) {
            foreach ($value as $q_number => $q_answer) {
                if ($key == 'mutichoose') {
                    $q_answer = json_decode($q_answer);
                    //多选比较答案
                } else {
//                    if($value == $answer[$key][$q_number])
                        $score += $score_std[$key];
                }
            }
        }
        dump($question_answer);
    }

    private function question_number($num = 2, $up = 5, $down = 1)
    {
        $source = array();
        for ($i = $down; $i <= $up; $i++)
            $source[$i] = null;
        return array_rand($source, $num);
    }
}
