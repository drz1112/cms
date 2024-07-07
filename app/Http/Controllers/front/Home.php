<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\backend\BoxM;
use App\Models\backend\ClientsM;
use App\Models\backend\FaqM;
use App\Models\backend\GaleriM;
use App\Models\backend\PagesM;
use App\Models\backend\PostsM;
use App\Models\backend\ProfilSingkatM;
use App\Models\backend\SettingBannerFrontM;
use App\Models\backend\SettingFrontM;
use App\Models\backend\SettingLayoutM;
use App\Models\backend\SettingWebsiteM;
use App\Models\backend\TeamM;
use App\Models\KategoriM;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $get_section_4 = SettingLayoutM::first();
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'settingfront' => SettingFrontM::first(),
            'settingbannerfront' => SettingBannerFrontM::first(),
            'settingboxs' => BoxM::first(),
            'settingclients' => ClientsM::where('clients_status', '1')->get(),
            'settinglayout' => SettingLayoutM::first(),
            'post_profilsingkat' => ProfilSingkatM::first(),
            'post_galeri' => GaleriM::where('galeri_status', '1')->orderByDesc('created_at')->limit(8)->get(),
            'post_team' =>TeamM::get(),
            'post_berita' => PostsM::with('postingan')->where('post_category_id', $get_section_4->section_4_setID)->where('post_status', 1)->orderByDesc('updated_at')->limit(4)->get(),
            'post_faq' => FaqM::where('faq_status', '1')->limit(5)->get(),
            'categories' => KategoriM::with('children')->where('parentid', 0)->where('menustatus', 1)->get(),
            'post_url_infopage' => KategoriM::where('id',$get_section_4->section_4_setID)->where('menustatus',1)->first(),
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
            return redirect()->route('FrontHome.index');
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
                // 'settinglayout' => SettingLayoutM::first(),
                'settinglayout' => SettingLayoutM::with('child_kategori_1_1','child_kategori_1_2','child_kategori_1_3','child_kategori_1_4', 'child_kategori_2_1', 'child_kategori_2_2', 'child_kategori_2_3', 'child_kategori_2_4')->first(),
            ];
            return view('front/page.attachment',$data);
        }
        
    }

    public function singlepage(Request $request){
        $checkTYPE = KategoriM::with('Pages')->where('slug',$request->post_slug)->first(); 
        if (is_null($checkTYPE)){
            return redirect()->route('FrontHome.index');
        };
        if ($checkTYPE->type === 'page') {
            if(is_null($checkTYPE->pages)) {
                return redirect()->route('FrontHome.index');
              }else{
                if ($checkTYPE->pages->pages_status === '0') {
                    return redirect()->route('FrontHome.index');
                }else{
                    $data = [
                        'post' => PagesM::with('postingan')->where('pages_slug',$checkTYPE->pages->pages_slug)->first(),
                        'categories' => KategoriM::with('children')->where('parentid',0)->get(),
                        'settingweb' => SettingWebsiteM::first(),
                        'settingfront' => SettingFrontM::first(),
                        'settingclients' => ClientsM::where('clients_status', '1')->get(),
                        'settinglayout' => SettingLayoutM::first(),
                    ];
                    return view('front/page.singlepage',$data);
                }
            }
        }
        if ($checkTYPE->type === 'article') {
            $checkArticle = KategoriM::with(['postingans' => function ($query) {
                $query->where('post_status', '1');
                $query->orderbyDesc('id');
            }])
            ->where('slug',$request->post_slug)
            ->first();
            $ids = $checkArticle->id;
            $postsM = PostsM::with('postingan')
                            ->where('post_status', "1")
                            ->where('post_category_id', $ids)
                            ->orderbyDesc('id')
                            ->paginate(10);
            $getkategori = $postsM->first();
            if($postsM->isNotEmpty()){
                $get_section_4 = SettingLayoutM::first();
                
                $data = [
                    'titles' => $checkArticle->namaKate,
                    'post' => $postsM,
                    'categories' => KategoriM::with('children')->where('parentid',0)->get(),
                    'settingweb' => SettingWebsiteM::first(),
                    'settingfront' => SettingFrontM::first(),
                    'settingclients' => ClientsM::where('clients_status', '1')->get(),
                    'post_url_infopage' => KategoriM::where('id',$get_section_4->section_4_setID)->where('menustatus',1)->first(),
                    'getKategori' => $getkategori->postingan->namaKate,
                    'settinglayout' => SettingLayoutM::first(),
                ];
                return view('front/page.singlearticle',$data);
            }else{
                return redirect()->route('FrontHome.index');
            }
        } else {
            return redirect()->route('FrontHome.index');
        }  
    }
}
