<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingBannerFrontM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingBannerFront extends Controller
{
    public function index(){
        if (SettingBannerFrontM::count() == 0) {
            SettingBannerFrontM::insert([
                [
                    'text_1' =>'S1',
                    'text_1_color' =>'#FFFFFF',
                    'text_2' =>'Teknologi Informasi',
                    'text_2_color' =>'#085284',
                    'text_3' =>'Universitas Muhammadiyah Klaten',
                    'text_3_color' =>'#FFFFFF',
                    'link_video' =>'https://www.youtube.com/watch?v=uZ29bL2Jt_c',
                    'text_link_video' =>'UMKLA',
                    'text_link_video_color' =>'#FFFFFF',
                    'hubungi_kami' =>'6281392236479',
                    'hubungi_kami_text' =>'Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI',
                    'image_banner_1' =>'img/banner-1800-720.webp',
                    'image_banner_2' =>'img/banner-1800-720-(2).webp',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
            return redirect()->route('settingsbannerfront.index')->with('success', 'Update was successful!');
        } else {
            $data = [
                'post_website' => SettingWebsiteM::first(),
                'post_banner_front' => SettingBannerFrontM::first(),
                ];
                return view('backend/page/settingbannerfront.home', $data);
        }
        
    }

    public function update(Request $request)
    {
        $check = SettingBannerFrontM::first();
        
        $request->validate([
            'text_1' => 'required|max:100',
            'text_2' => 'required|max:100',
            'text_3' => 'required|max:255',
            'text_1_color' => 'required|max:100',
            'text_2_color' => 'required|max:100',
            'text_3_color' => 'required|max:255',
            'link_video' => 'required|max:255',
            'text_link_video' => 'required|max:255',
            'hubungi_kami' => 'required|max:255',
            'hubungi_kami_text' => 'required|max:255',
            'upload_banner_1' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=1800,min-height=720',
            'upload_banner_2' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=1800,min-height=720',
        ]);

        if($request->hasFile('upload_banner_1')) {
            if ($check->image_banner_1) {
                $image_path = public_path("\\") .$check->image_banner_1;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_banner_1')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_banner_1')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_banner_1')->move(public_path('img'), $fileName);
            $url_image_banner_1 = ('img/'.$fileName);          
        }else{
            $url_image_banner_1 = $check->image_banner_1;
        }

        if($request->hasFile('upload_banner_2')) {
            if ($check->image_banner_2) {
                $image_path_2 = public_path("\\") .$check->image_banner_2;
                if(File::exists($image_path_2)) {
                    File::delete($image_path_2);
                }
            }
            $originName = $request->file('upload_banner_2')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_banner_2')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_banner_2')->move(public_path('img'), $fileName);
            $url_image_banner_2 = ('img/'.$fileName);          
        }else{
            $url_image_banner_2 = $check->image_banner_2;
        }

        $checkWAnumber = substr($request->hubungi_kami, 0, 1);
        if ($checkWAnumber == 0) {
            $contact_wa = substr_replace($request->hubungi_kami,'62',0,1);
        } else {
            $contact_wa = $request->hubungi_kami;
        }

        $inputdata = [
            'image_banner_1' => $url_image_banner_1,
            'image_banner_2' => $url_image_banner_2,
            'hubungi_kami' => $contact_wa,
            'hubungi_kami_text' => $request->hubungi_kami_text,
            'text_1' => $request->text_1,
            'text_2' => $request->text_2,
            'text_3' => $request->text_3,
            'text_1_color' => $request->text_1_color,
            'text_2_color' => $request->text_2_color,
            'text_3_color' => $request->text_3_color,
            'link_video' => $request->link_video,
            'text_link_video' => $request->text_link_video,           
            'text_link_video_color' => $request->text_link_video_color,           
        ];
        SettingBannerFrontM::first()->update($inputdata);
        return redirect()->route('settingsbannerfront.index')->with('success', 'Update was successful!');
    }
    public function updatedefault() {

        $inputdata = [
            'text_1' =>'S1',
            'text_1_color' =>'#FFFFFF',
            'text_2' =>'Teknologi Informasi',
            'text_2_color' =>'#085284',
            'text_3' =>'Universitas Muhammadiyah Klaten',
            'text_3_color' =>'#FFFFFF',
            'link_video' =>'https://www.youtube.com/watch?v=uZ29bL2Jt_c',
            'text_link_video' =>'UMKLA',
            'text_link_video_color' =>'#FFFFFF',
            'hubungi_kami' =>'6281392236479',
            'hubungi_kami_text' =>'Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI',
            'image_banner_1' =>'img/banner-1800-720.webp',
            'image_banner_2' =>'img/banner-1800-720-(2).webp',
        ];
        SettingBannerFrontM::first()->update($inputdata);
        return redirect()->route('settingsbannerfront.index')->with('success', 'Update was successful!');
    }
}
