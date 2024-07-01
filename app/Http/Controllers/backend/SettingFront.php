<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingFrontM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;

class SettingFront extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'post_website' => SettingWebsiteM::first(),
            'post_front' => SettingFrontM::first(),
        ];
        return view('backend/page/settingfront.home', $data);
    }
    public function update(Request $request)
    {
        $request->validate([
            "default_font" => "required|max:255",
            "heading_font" => "required|max:255",
            "nav_font" => "required|max:255",
            "background_color" => "required|max:255",
            "default_color" => "required|max:255",
            "heading_color" => "required|max:255",
            "main_color" => "required|max:255",
            "contrast_color" => "required|max:255",
            "nav_color" => "required|max:255",
            "nav_hover_color" => "required|max:255",
            "nav_dropdown_background_color" => "required|max:255",
            "nav_dropdown_color" => "required|max:255",
            "nav_dropdown_hover_color" => "required|max:255",
        ]);
        $inputdata = [
            "default_font" => $request->default_font,
            "heading_font" => $request->heading_font,
            "nav_font" => $request->nav_font,
            "background_color" => $request->background_color,
            "default_color" => $request->default_color,
            "heading_color" => $request->heading_color,
            "main_color" => $request->main_color,
            "contrast_color" => $request->contrast_color,
            "nav_color" => $request->nav_color,
            "nav_hover_color" => $request->nav_hover_color,
            "nav_dropdown_background_color" => $request->nav_dropdown_background_color,
            "nav_dropdown_color" => $request->nav_dropdown_color,
            "nav_dropdown_hover_color" => $request->nav_dropdown_hover_color,
        ];
        SettingFrontM::first()->update($inputdata);
        return redirect()->route('settingsfront.index')->with('success', 'Update was successful!');
    }
}
