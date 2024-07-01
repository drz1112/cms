<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('backhome.index');
        } else {
            $data = ['settingweb' => SettingWebsiteM::first()];
            return view('backend/page.login', $data);
        }
    }
    public function authlogin(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('backhome.index')->with('success', 'Assalamualaikum warahmatullahi wabarakatuh');
        } else {
            return back()->with('error', 'Login Failed!');
        }
    }
    public function authlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Terima Kasih');
    }
}
