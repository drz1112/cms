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
    public function detailposts(Request $request)
    {   
        // return PostsM::with(['postingan','postauthor'])->where('post_slug', $request->post_slug)->where('post_status', '1')->first();
        $check = PostsM::with('postingan')->where('post_slug', $request->post_slug)->first();
        $previous = PostsM::where('id', '<', $check->id)
                            ->where('post_category_id', $check->post_category_id)
                            ->where('post_status', '1')
                            ->max('id');
        $next = PostsM::where('id', '>', $check->id)
                            ->where('post_category_id', $check->post_category_id)
                            ->where('post_status', '1')
                            ->min('id');
        
        if (is_null($previous)) {
            $sebelumnya = '';
        } else {
           $sebelumnya = PostsM::find($previous);
        }

        if (is_null($next)) {
            $selanjutnya = '';
        } else {
            $selanjutnya = PostsM::find($next);
        } 
        $validateStatus = PostsM::with(['postingan','postauthor'])->where('post_slug', $request->post_slug)->where('post_status', '1')->first();
        if (is_null($validateStatus)) {
            return redirect('/');
        }else{
            $data = [
                'sebelumnya' => $sebelumnya,
                'selanjutnya' => $selanjutnya,
                'post' => PostsM::with(['postingan','postauthor'])->where('post_slug', $request->post_slug)->where('post_status', '1')->first(),
                'post_berita' => PostsM::with(['postingan','postauthor'])->where('post_status', '1')->where('post_category_id', '3')->orderByDesc('updated_at')->take(3)->get(),
                'categories' => KategoriM::with('children')->where('parentid',0)->get(),
                'settingweb' => SettingWebsiteM::first(),
                'settingfront' => SettingFrontM::first(),
                'settingbannerfront' => SettingBannerFrontM::first(),
                'settingclients' => ClientsM::where('clients_status', '1')->get(),
            ];
            return view('front/page.attachment',$data);
        }
        
    }
}
