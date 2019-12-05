<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\FillBlank;
use App\Models\Judge;
use App\Models\Mutichoose;
use App\Models\Userdata;
use Illuminate\Http\Request;
use App\User;
use Schema;

class main extends Controller
{
    public function login()
    {
        $appid = 'wxc20c84c652cf7a61';
        $appsecret = '1bf0b2c55b9676074b824164c0ad5b57';
        $code = $_POST['code'];
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appid . '&secret=' . $appsecret . '&js_code=' . $code . '&grant_type=authorization_code';
        $openid = $this->curl($url);
        if ($openid) {
            Userdata::where('userid', $openid)->delete();
            Userdata::create(array('userid' => $openid));
        }
        return $openid;
    }

    public function question(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Userdata $userdata, $userid)
    {
        $question_id = array('choose' => array(), 'mutichoose' => array(), 'fillBlank' => array(), 'judge' => array());
        foreach ($choose->select('id')->get()->toArray() as $id)
            array_push($question_id['choose'], $id['id']);
        foreach ($mutichoose->select('id')->get()->toArray() as $id)
            array_push($question_id['mutichoose'], $id['id']);
        foreach ($fillBlank->select('id')->get()->toArray() as $id)
            array_push($question_id['fillBlank'], $id['id']);
        foreach ($judge->select('id')->get()->toArray() as $id)
            array_push($question_id['judge'], $id['id']);
        $question_number = json_decode(User::select('qnumber')->where('name', 'root')->get()->toArray()[0]['qnumber'], true);
        $question_number = $this->question_number($question_id, $question_number);

        $userdata->where('userid', $userid)->update($question_number);

        foreach ($question_number as $kind => $value) {
            $value = json_decode($value, true);
            eval('$which=$' . $kind . ';');
            foreach ($value as $q_number => $q_id) {
                if (Schema::hasColumn($kind . 's', 'options')) {
                    $data[$kind][$q_number] = $which
                        ->select('question', 'options')
                        ->where('id', $q_id)
                        ->get()
                        ->toArray()[0];
                    $data[$kind][$q_number]['options'] = json_decode($data[$kind][$q_number]['options']);
                } else {
                    $data[$kind][$q_number] = $which
                        ->select('question')
                        ->where('id', $q_id)
                        ->get()
                        ->toArray()[0];
                }
            }
        }
        return json_encode($data);
    }

    public function answer(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Userdata $userdata, $userid)
    {
        $userdata->where('userid', $userid)->update(array('answer' => $_POST['answer']));
        $answer = json_decode($_POST['answer'], true);

        $question_number = $userdata
            ->select('choose', 'mutichoose', 'fillBlank', 'judge')
            ->where('userid', $userid)
            ->get()
            ->toArray()[0];

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
            'fillBlank' => 3,
            'judge' => 1
        );//各种题得分
        $score_miss = 1;//多选题漏选得分

        $result['score'] = 0;
        foreach ($answer as $key => $item) {
            foreach ($item as $value) {
                if ($value['index']) {
                    $index = $value['index'] - 1;
                    $q_answer = $question_answer[$key][$index];
                    if ($key == 'mutichoose') {
                        $q_answer = json_decode($q_answer, true);
                        if (!array_diff($value['value'], $q_answer)) {
                            $result['score'] += $score_miss;
                            $result['mutichoose'][$index] = false;
                            if (!array_diff($q_answer, $value['value'])) {
                                $result['score'] += ($score_std['mutichoose'] - $score_miss);
                                $result['mutichoose'][$index] = true;
                            }
                        } else $result['mutichoose'][$index] = false;
                    } else if ($q_answer == $value['value']) {
                        $result['score'] += $score_std[$key];
                        $result[$key][$index] = true;
                    } else $result[$key][$index] = false;
                }
            }
        }

        $result = json_encode($result);
        $userdata->where('userid', $userid)->update(array(
            'answer' => json_encode($answer),
            'result' => $result
        ));
        return $result;
    }

    public function curl($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
//            echo 'Errno'.curl_error($curl);
            return 0;
        }
        curl_close($curl);
        $result = json_decode($result, true);
        return $result['openid'];
    }

    private function question_number($id, $number)//随机题号
    {
        foreach ($id as $key => $value) {
            if ($number[$key])
                $result_key[$key] = array_rand($value, $number[$key]);
        }
        foreach ($result_key as $key => $value) {
            if (is_array($value)) {
                $result[$key] = array();
                foreach ($value as $id_num) {
                    array_push($result[$key], $id[$key][$id_num]);
                }
            } else $result[$key] = array($id[$key][$value]);
            $result[$key] = json_encode($result[$key]);
        }
        return $result;
    }
}
