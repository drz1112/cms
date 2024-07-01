<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingFront;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'settingfront' => SettingFront::first(),
            'categories' => KategoriM::with('children')->where('parentid', 0)->where('menustatus', 1)->get(),
        ];
        return view('front/page.index', $data);
    }
}
