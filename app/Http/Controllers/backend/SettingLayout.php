<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingLayoutM;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Illuminate\Http\Request;

class SettingLayout extends Controller
{
    public function index(){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'settinglayout' => SettingLayoutM::first(),
            'categories' => KategoriM::where('type','article')->where('menustatus', 1)->get(),
            'categories_usefull_link' => KategoriM::where('menustatus', 1)->get(),
        ];
        return view('backend/page/settinglayout.home', $data);
    }
    public function update(Request $request) {
        empty($request->section_1_activation) ? $section_1 = '0' : $section_1 = '1';
        empty($request->section_2_activation) ? $section_2 = '0' : $section_2 = '1';
        empty($request->section_3_activation) ? $section_3 = '0' : $section_3 = '1';
        empty($request->section_4_activation) ? $section_4 = '0' : $section_4 = '1';
        empty($request->section_5_activation) ? $section_5 = '0' : $section_5 = '1';
        empty($request->section_6_activation) ? $section_6 = '0' : $section_6 = '1';
        empty($request->section_7_activation) ? $section_7 = '0' : $section_7 = '1';
        empty($request->section_8_activation) ? $section_8 = '0' : $section_8 = '1';
        empty($request->banner_2_activation) ? $banner_2 = '0' : $banner_2 = '1';
        empty($request->link_footer_1_activation) ? $link_footer_1 = '0' : $link_footer_1 = '1';
        empty($request->link_footer_2_activation) ? $link_footer_2 = '0' : $link_footer_2 = '1';
        $request->validate([
            "section_1" => 'in:0,1',
            "section_2" => 'in:0,1',
            "section_3" => 'in:0,1',
            "section_4" => 'in:0,1',
            "section_5" => 'in:0,1',
            "section_6" => 'in:0,1',
            "section_7" => 'in:0,1',
            "section_8" => 'in:0,1',
            "banner_2" => 'in:0,1',
            "link_footer_1" => 'in:0,1',
            "link_footer_2" => 'in:0,1',

            "section_4_setID" => "required|exists:kategori,id",
            "link_footer_1_1" => "required|exists:kategori,id",
            "link_footer_1_2" => "required|exists:kategori,id",
            "link_footer_1_3" => "required|exists:kategori,id",
            "link_footer_1_4" => "required|exists:kategori,id",

            "link_footer_2_1" => "required|exists:kategori,id",
            "link_footer_2_2" => "required|exists:kategori,id",
            "link_footer_2_3" => "required|exists:kategori,id",
            "link_footer_2_4" => "required|exists:kategori,id",
        ]);

        $inputdata = [
            "section_1_activation" => $section_1,
            "section_2_activation" => $section_2,
            "section_3_activation" => $section_3,
            "section_4_activation" => $section_4,
            "section_5_activation" => $section_5,
            "section_6_activation" => $section_6,
            "section_7_activation" => $section_7,
            "section_8_activation" => $section_8,
            "banner_2_activation" => $banner_2,
            "link_footer_1_activation" => $link_footer_1,
            "link_footer_2_activation" => $link_footer_2,

            "section_4_setID" => $request->section_4_setID,
            "link_footer_1_1" => $request->link_footer_1_1,
            "link_footer_1_2" => $request->link_footer_1_2,
            "link_footer_1_3" => $request->link_footer_1_3,
            "link_footer_1_4" => $request->link_footer_1_4,

            "link_footer_2_1" => $request->link_footer_2_1,
            "link_footer_2_2" => $request->link_footer_2_2,
            "link_footer_2_3" => $request->link_footer_2_3,
            "link_footer_2_4" => $request->link_footer_2_4,
        ];
        SettingLayoutM::first()->update($inputdata);
        return redirect()->route('settinglayout.index')->with('success', 'Update was successful!');
    }
    public function updatedefault(Request $request) {
        $inputdata = [
            'section_1_activation' => '1',
            'section_2_activation' => '1',
            'section_3_activation' => '1',
            'section_4_activation' => '1',
            'section_4_setID' => '1',

            'section_5_activation' => '1',
            'section_6_activation' => '1',
            'section_7_activation' => '1',
            'section_8_activation' => '1',
            'banner_2_activation' => '1',

            'link_footer_1_activation' => '1',
            'link_footer_2_activation' => '1',

            'link_footer_1_1' => '1',
            'link_footer_1_2' => '1',
            'link_footer_1_3' => '1',
            'link_footer_1_4' => '1',
            
            'link_footer_2_1' => '1',
            'link_footer_2_2' => '1',
            'link_footer_2_3' => '1',
            'link_footer_2_4' => '1',

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        SettingLayoutM::first()->update($inputdata);
        return redirect()->route('settinglayout.index')->with('success', 'Restore was successful!');
    }
}
