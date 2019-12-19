<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\FillBlank;
use App\Models\Judge;
use App\Models\Mutichoose;
use App\Models\Userdata;
use App\User;
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
        $data = json_decode($request->getContent(), true);
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
        return 1;
    }

    public function put(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Request $request, $kind)
    {
        $data = json_decode($request->getContent(), true);
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
        return 1;
    }

    public function delete(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Request $request, $kind)
    {
        $id = $request->getContent();
        eval('$which=$' . $kind . ';');
        $which->where('id', $id)->delete();
        return $id;
    }

    public function getsetting()
    {
        $data = User::select('qnumber')->where('name', 'root')->get()->toArray()[0];
        return json_encode($data['qnumber']);
    }

    public function putsetting(Request $request)
    {
        User::where('name', 'root')->update(array('qnumber' => $request->getContent()));
        return 1;
    }

    public function postFile(Choose $choose, Mutichoose $mutichoose, FillBlank $fillBlank, Judge $judge, Request $request)
    {
        $path = $request->file('question')->store('question');
        $savepath = storage_path('app/' . $path);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $savepath);
        finfo_close($finfo);
        if ($mime == 'text/plain') {
            User::where('name', 'root')->update(array('qfile' => $path));
            $f = fopen($savepath, 'r');
            $data = array();
            while (!feof($f))
                array_push($data, fgetcsv($f));
        }

        if (!array_diff(array('question', 'a', 'b', 'c', 'd', 'answer'), array_shift($data))) {
            foreach ($data as $value) {
                eval('$which=$' . $value[0] . ';');
                switch ($value[0]) {
                    case 'choose':
                        $question = array('question' => $value[1],
                            'options' => json_encode(array(
                                array('key' => 'a', 'value' => $value[2]),
                                array('key' => 'b', 'value' => $value[3]),
                                array('key' => 'c', 'value' => $value[4]),
                                array('key' => 'd', 'value' => $value[5])
                            )),
                            'answer' => $value[6]);
                        break;
                    case 'mutichoose':
                        if (json_decode($value[6]) == null)
                            return 'mutichoose';
                        $question = array('question' => $value[1],
                            'options' => json_encode(array(
                                array('key' => 'a', 'value' => $value[2]),
                                array('key' => 'b', 'value' => $value[3]),
                                array('key' => 'c', 'value' => $value[4]),
                                array('key' => 'd', 'value' => $value[5])
                            )),
                            'answer' => $value[6]);
                        break;
                    case 'judge':
                        if ($value[6] === 0 || $value[6] === 1 || $value[6] === '0' || $value[6] === '1') {
                            $question = array('question' => $value[1],
                                'options' => json_encode(array(
                                    array('key' => '0', 'value' => '错'),
                                    array('key' => '1', 'value' => '对')
                                )),
                                'answer' => $value[6]);
                            break;
                        } else return 'judge' . $value[6];

                    case 'fillBlank':
                        $question = array('question' => $value[1], 'answer' => $value[6]);
                        break;
                    default:
                        return 'fillBlank';
                }
                $which->create($question);
            }
        }
        return json_encode($data);
    }

    public function csv(){
        return response()->download(storage_path('app/vxdt_example.csv'));
    }
}
