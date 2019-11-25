<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Fillblank;
use App\Models\Judge;
use App\Models\Mutichoose;
use App\Models\Userdata;
use Illuminate\Http\Request;

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
        $question_number = array('choose' => json_encode($this->question_number()),
                            'mutichoose' => json_encode($this->question_number()),
                            'fillblank' => json_encode($this->question_number()),
                            'judge' => json_encode($this->question_number())
                            );
        $userdata->where('userid', $userid)->update($question_number);
        //dump($question_number);
    }

    public function answer($userid)
    {
        return $userid;
    }

    private function question_number($down = 1, $up = 5, $num = 2)
    {
        $source = array();
        for ($i = $down; $i <= $up; $i++)
            array_push($source, $i);
        return array_rand($source, $num);
    }
}
