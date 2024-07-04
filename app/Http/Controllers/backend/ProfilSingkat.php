<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ProfilSingkatM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilSingkat extends Controller
{
    public function index(){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'post_profilsingkat' => ProfilSingkatM::first(),
        ];
        return view('backend/page/profilsingkat.home', $data);
    }

    public function  update(Request $request){

        $check = ProfilSingkatM::first();
        $request->validate([
            'profilsingkat_title' => 'required|max:100',
            'profilsingkat_subtitle' => 'required|max:100',
            'profilsingkat_description' => 'required',
            'profilsingkat_gambar' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=450',
        ]);
        if($request->hasFile('profilsingkat_gambar')) {
            if ($check->profilsingkat_gambar) {
                $image_path = public_path("\\") .$check->profilsingkat_gambar;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('profilsingkat_gambar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('profilsingkat_gambar')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('profilsingkat_gambar')->move(public_path('img'), $fileName);
            $url_profilsingkat_gambar = ('img/'.$fileName);          
        }else{
            $url_profilsingkat_gambar = $check->profilsingkat_gambar;
        }

        $inputdata = [
            'profilsingkat_title' => $request->profilsingkat_title,
            'profilsingkat_subtitle' => $request->profilsingkat_subtitle,
            'profilsingkat_description' => $request->profilsingkat_description,
            'profilsingkat_gambar' => $url_profilsingkat_gambar,
        ];
        ProfilSingkatM::first()->update($inputdata);
        return redirect()->route('profilsingkat.index')->with('success', 'Update was successful!');
    }
}
