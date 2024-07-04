<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\backend\BoxM;
use App\Models\backend\ClientsM;
use App\Models\backend\SettingBannerFrontM;
use App\Models\backend\SettingFrontM;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'settingfront' => SettingFrontM::first(),
            'settingbannerfront' => SettingBannerFrontM::first(),
            'settingboxs' => BoxM::first(),
            'settingclients' => ClientsM::get(),
            'categories' => KategoriM::with('children')->where('parentid', 0)->where('menustatus', 1)->get(),
        ];
        return view('front/page.index', $data);
    }
}
