<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $data = [
            'post_website' => SettingWebsiteM::first(),
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page.home', $data);
    }
}
