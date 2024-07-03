<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\BoxM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;

class SettingBoxs extends Controller
{
    public function index(){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'post_boxs' => BoxM::first(),
        ];
        return view('backend/page/boxs.home', $data);
    }
    public function update(Request $request){
        empty($request->status_box_1) ? $status_1 = '0' : $status_1 = '1';
        empty($request->status_box_2) ? $status_2 = '0' : $status_2 = '1';
        empty($request->status_box_3) ? $status_3 = '0' : $status_3 = '1';
        empty($request->status_box_4) ? $status_4 = '0' : $status_4 = '1';
        $request->validate([
            "judul_box_1" => "required|max:255",
            "judul_box_2" => "required|max:255",
            "judul_box_3" => "required|max:255",
            "judul_box_4" => "required|max:255",
            
            "deskripsi_box_1" => "required|max:255",
            "deskripsi_box_2" => "required|max:255",
            "deskripsi_box_3" => "required|max:255",
            "deskripsi_box_4" => "required|max:255",
            'status_1' => 'in:0,1',
            'status_2' => 'in:0,1',
            'status_3' => 'in:0,1',
            'status_4' => 'in:0,1',

        ]);
        $inputdata = [
            "judul_box_1" => $request->judul_box_1,
            "judul_box_2" => $request->judul_box_2,
            "judul_box_3" => $request->judul_box_3,
            "judul_box_4" => $request->judul_box_4,
            
            "deskripsi_box_1" => $request->deskripsi_box_1,
            "deskripsi_box_2" => $request->deskripsi_box_2,
            "deskripsi_box_3" => $request->deskripsi_box_3,
            "deskripsi_box_4" => $request->deskripsi_box_4,

            'status_box_1' => $status_1,
            'status_box_2' => $status_2,
            'status_box_3' => $status_3,
            'status_box_4' => $status_4,

        ];
        BoxM::first()->update($inputdata);
        return redirect()->route('settingboxs.index')->with('success', 'Update was successful!');

    }
    public function updatedefault(){
        $inputdata = [
            'judul_box_1' => 'Box 1',
            'deskripsi_box_1'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
            'status_box_1' => '1',
            
            'judul_box_2' => 'Box 2',
            'deskripsi_box_2'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
            'status_box_2' => '1',

            'judul_box_3' => 'Box 3',
            'deskripsi_box_3'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
            'status_box_3' => '1',

            'judul_box_4' => 'Box 4',
            'deskripsi_box_4'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
            'status_box_4' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        BoxM::first()->update($inputdata);
        return redirect()->route('settingboxs.index')->with('success', 'Update was successful!');
    }
}
