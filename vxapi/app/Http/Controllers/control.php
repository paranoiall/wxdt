<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\FillBlank;
use App\Models\Judge;
use App\Models\Mutichoose;
use App\Models\Userdata;
use Illuminate\Http\Request;

class control extends Controller
{
    public function get(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Userdata $userdata, $kind)
    {
        eval('$data=$' . $kind . '->all()->toArray();');
        foreach ($data as $num => $item) {
            $result[$num] = array(
                'id' => $item['id'],
                'question' => $item['question'],
                'answer' => $item['answer']
            );
            if (isset($item['options'])) {
                $item['options'] = json_decode($item['options'], true);
                foreach ($item['options'] as $value)
                    $result[$num][$value['key']] = $value['value'];
            }
        }
        return json_encode($result);
    }

    public function post(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Userdata $userdata, Request $request, $kind)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $options = array();
        $result = array('question' => $data['question'],
            'answer' => $data['answer'],
        );
        if ($kind != 'fillBlank') {
            foreach ($data['options'] as $key => $value) {
                array_push($options, array('key' => $key, 'value' => $value));
            }
            $result['options'] = json_encode($options);
        }

        eval('$which=$' . $kind . ';');
        $which->create($result);
        return json_encode($result);
    }

    public function put(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Request $request, $kind)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $id = $data['id'];
        $options = array();
        $result = array('question' => $data['question'],
            'answer' => $data['answer'],
        );
        if ($kind != 'fillBlank') {
            foreach ($data['options'] as $key => $value) {
                array_push($options, array('key' => $key, 'value' => $value));
            }
            $result['options'] = json_encode($options);
        }
        eval('$which=$' . $kind . ';');
        $which->where('id', $id)->update($result);
        return json_encode($result);
    }

    public function delete(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Request $request, $kind)
    {
        $id = $request->getContent();
        eval('$which=$' . $kind . ';');
        $which->where('id', $id)->delete();
        return $id;
    }
}