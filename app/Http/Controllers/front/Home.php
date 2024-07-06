<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\backend\BoxM;
use App\Models\backend\ClientsM;
use App\Models\backend\FaqM;
use App\Models\backend\GaleriM;
use App\Models\backend\PostsM;
use App\Models\backend\ProfilSingkatM;
use App\Models\backend\SettingBannerFrontM;
use App\Models\backend\SettingFrontM;
use App\Models\backend\SettingWebsiteM;
use App\Models\backend\TeamM;
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
            'settingclients' => ClientsM::where('clients_status', '1')->get(),
            'post_profilsingkat' => ProfilSingkatM::first(),
            'post_galeri' => GaleriM::where('galeri_status', '1')->orderByDesc('created_at')->limit(8)->get(),
            'post_team' =>TeamM::get(),
            'post_berita' => PostsM::with('postingan')->where('post_category_id', '3')->where('post_status', 1)->orderByDesc('updated_at')->limit(4)->get(),
            'post_faq' => FaqM::where('faq_status', '1')->limit(5)->get(),
            'categories' => KategoriM::with('children')->where('parentid', 0)->where('menustatus', 1)->get(),
        ];
        return view('front/page.index', $data);
    }
}
