<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingWebsite extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'post_website' => SettingWebsiteM::first(),
        ];
        return view('backend/page/settingwebsite.home', $data);
    }
    public function update(Request $request)
    {
        $check = SettingWebsiteM::first();
        
        $request->validate([
            'site_title' => 'required|max:100',
            'site_keyword' => 'required|max:100',
            'site_description' => 'required|max:255',
            'upload_login' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:width=450,height=450',
            'upload_dashboard' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=220,min-height=50',
            'upload_favicon' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:width=180,height=180',
            'upload_navbar' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=180',
            'upload_footer' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=180',
            'site_twitter' => 'required|max:255',
            'site_facebook' => 'required|max:255',
            'site_instagram' => 'required|max:255',
            'site_youtube' => 'required|max:255',
            'site_tiktok' => 'required|max:255',

            'site_contact_email' => 'required|max:25',
            'site_contact_wa' => 'required|max:13',
            'site_contact_wa_content' => 'required|max:100',
            'site_contact_tlp' => 'required|max:13',
            'site_contact_address' => 'required|max:255',

        ]);

        if($request->hasFile('upload_login')) {
            if ($check->site_Image_login) {
                $image_path = public_path("\\") .$check->site_Image_login;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_login')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_login')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_login')->move(public_path('img'), $fileName);
            $url_upload_login = ('img/'.$fileName);          
        }else{
            $url_upload_login = $check->site_Image_login;
        }
        if($request->hasFile('upload_dashboard')) {
            if ($check->site_Image_dashboard) {
                $image_path = public_path("\\") .$check->site_Image_dashboard;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_dashboard')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_dashboard')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_dashboard')->move(public_path('img'), $fileName);
            $url_upload_dashboard = ('img/'.$fileName);
           
        }else{
            $url_upload_dashboard = $check->site_Image_dashboard;
        }

        if($request->hasFile('upload_favicon')) {
            if ($check->site_Image_favicon) {
                $image_path = public_path("\\") .$check->site_Image_favicon;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_favicon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_favicon')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_favicon')->move(public_path('img'), $fileName);
            $url_upload_favicon = ('img/'.$fileName);

            
        }else{
            $url_upload_favicon = $check->site_Image_favicon;
        }

        if($request->hasFile('upload_navbar')) {
            if ($check->site_Image_navbar) {
                $image_path = public_path("\\") .$check->site_Image_navbar;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_navbar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_navbar')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_navbar')->move(public_path('img'), $fileName);
            $url_upload_navbar = ('img/'.$fileName);

            
        }else{
            $url_upload_navbar = $check->site_Image_navbar;
        }
        
        if($request->hasFile('upload_footer')) {
            if ($check->site_Image_footer) {
                $image_path = public_path("\\") .$check->site_Image_footer;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('upload_footer')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload_footer')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload_footer')->move(public_path('img'), $fileName);
            $url_upload_footer = ('img/'.$fileName);

            
        }else{
            $url_upload_footer = $check->site_Image_footer;
        }

        $checkWAnumber = substr($request->site_contact_wa, 0, 1);
        if ($checkWAnumber == 0) {
            $contact_wa = substr_replace($request->site_contact_wa,'62',0,1);
        } else {
            $contact_wa = $request->site_contact_wa;
        }
        $inputdata = [
            'site_title' => $request->site_title,
            'site_keyword' => $request->site_keyword,
            'site_description' => $request->site_description,

            'site_Image_login' => $url_upload_login,
            'site_Image_dashboard' => $url_upload_dashboard,
            'site_Image_favicon' => $url_upload_favicon,

            'site_Image_navbar' => $url_upload_navbar,
            'site_Image_footer' => $url_upload_footer,


            'site_twitter' => $request->site_twitter,
            'site_facebook' => $request->site_facebook,
            'site_instagram' => $request->site_instagram,
            'site_youtube' => $request->site_youtube,
            'site_tiktok' => $request->site_tiktok,

            'site_contact_email' => $request->site_contact_email,
            'site_contact_wa' => $contact_wa,
            'site_contact_wa_content' => $request->site_contact_wa_content,
            'site_contact_tlp' => $request->site_contact_tlp,
            'site_contact_address' => $request->site_contact_address,
        ];
        SettingWebsiteM::first()->update($inputdata);
        return redirect()->route('settingswebsite.index')->with('success', 'Update was successful!');
    }

    public function updatedefault(Request $request) {

        $inputdata = [
            'site_title' => 'CMS TI UMKLA',
            'site_keyword' => 'CMS TI UMKLA',
            'site_description' => 'CMS TI UMKLA',
            'site_Image_favicon' => 'img/favicon.png',
            'site_Image_navbar' => 'img/Logo-MDMC-Putih.png',
            'site_Image_footer' => 'img/Logo-footer-default.png',
            'site_Image_login' => 'img/Logo-login-default.png',
            'site_Image_dashboard' => 'img/Logo-dashboard-default.webp',

            'site_twitter' => 'https://twitter.com/',
            'site_facebook' => 'https://www.facebook.com/',
            'site_instagram' => 'https://www.instagram.com/',
            'site_youtube' => 'https://www.youtube.com/',
            'site_tiktok' => 'https://www.tiktok.com/',
            
            'site_contact_email' => 'admin@umkla.ac.id',
            'site_contact_wa' => '081392236479',
            'site_contact_wa_content' => 'Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI',
            'site_contact_tlp' => '(0272) 323120',
            'site_contact_address' => 'Jl. Jombor Indah, Gemolong, Buntalan, Kec. Klaten Tengah Kabupaten Klaten, Jawa Tengah 57419',
        ];
        SettingWebsiteM::first()->update($inputdata);
        return redirect()->route('settingswebsite.index')->with('success', 'Update was successful!');
    }


}
