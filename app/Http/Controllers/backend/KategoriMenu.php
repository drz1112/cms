<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KategoriMenu extends Controller
{
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(KategoriM::class, 'slug', $request->namaKate);
        return response()->json(['slug' => $slug]);
    }

    public function index()
    {
        if (request('q')) {
            $ss = KategoriM::with('parents')->where('nameCate', 'like', '%' . request('q') . '%')->paginate(10);
        } else {
            $ss = KategoriM::with('parents')->paginate(10);
        }
        $data = [
            'categories' => $ss,
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/kategori.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'parent' => KategoriM::where('parentid', 0)->get(),
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/kategori.add', $data);
    }
    public function store(Request $request)
    {
        $validates = $request->validate([
            'namaKate' => 'required|unique:kategori',
            'slug' => 'required|unique:kategori',
            'menustatus' => 'required|in:0,1',
            'type_menu' => 'required|in:page,article',
        ]);
        KategoriM::create(
            [
                'namaKate' => $request->namaKate,
                'menustatus' => $request->menustatus,
                'type' => $request->type_menu,
                'parentid' => '0',
                'slug' => $request->slug,
            ]
        );
        return redirect()->route('kategorimenu.index')->with('success', 'Add New Parent Menu was successful!');
    }
    public function storechild(Request $request)
    {
        $request->validate([
            'idparent' => 'required|exists:kategori,id',
            'nameparentKate' => 'required|unique:kategori,namaKate',
            'slug2' => 'required|unique:kategori,slug',
            'menustatus2' => 'required|in:0,1',
        ]);
        KategoriM::create(
            [
                'namaKate' => $request->nameparentKate,
                'slug' => $request->slug2,
                'menustatus' => $request->menustatus2,
                'parentid' => $request->idparent,
                'type' => 'article',
            ]
        );
        return redirect()->route('kategorimenu.index')->with('success', 'Add New Child Menu was successful!');
    }
    public function updatestatus(Request $request)
    {
        if ($request->menustatus == 0) {
            $menustat = 1;
        }else{
            $menustat = 0;
        };
        KategoriM::where('id', $request->id)
        ->where('slug', $request->slug)
        ->update(['menustatus' => $menustat]);
        return redirect()->route('kategorimenu.index')->with('success', 'Update Menu Status was successful!');
    }
    public function edit($slugs, Request $request)
    {
        $cek =  KategoriM::where('slug', $slugs)->first();
        if ($cek->parentid === 0) {
            $post = KategoriM::where('slug', $slugs)->first();
            $settingweb = SettingWebsiteM::first();
            return view('backend/page/kategori.edit', compact('post', 'settingweb'));

        } else {
            $parent = KategoriM::where('parentid', 0)->get();
            $post = KategoriM::where('slug', $slugs)->first();
            $settingweb = SettingWebsiteM::first();
            return view('backend/page/kategori.edit', compact('post', 'parent', 'settingweb'));
        }
    }
    public function update(Request $request)
    {
        $check = KategoriM::where('id', $request->id)->first();
       
        if (empty($check->parentid)) {  
            $rules = [
                'namaKate' => 'required',
                'slug' => 'required',
            ];
            $request->validate($rules);
            if (($check->slug) != $request->slug) {
                $rules2['slug'] = 'required|unique:kategori';
                $request->validate($rules2);
            }
            KategoriM::where('id', $request->id)
                        ->update([
                            'namaKate' => $request->namaKate,
                            'slug' => $request->slug,
                            ]);
            return redirect()->route('kategorimenu.index')->with('success', 'Edit Parent Menu was successful!');
        }else{
            $rules = [
                'idparent' => 'required',
                'nameparentKate' => 'required',
                'slug2' => 'required',
            ];
            $request->validate($rules);
   
            if (($check->slug) != $request->slug2) {
                $rules2 = [
                    'slug2' => 'required|unique:kategori,slug',
                ];
                $request->validate($rules2);
            }
            KategoriM::where('id', $request->id)
                    ->update([
                            'parentid' => $request->idparent,
                            'namaKate' => $request->nameparentKate,
                            'slug' => $request->slug2,
                            ]);

            return redirect()->route('kategorimenu.index')->with('success', 'Edit Child Menu was successful!');

        }
    }
    public function destroy(Request $request)
    {
        KategoriM::destroy($request->id);
        return redirect()->route('kategorimenu.index')->with('success', 'Add New Parent Menu was successful!');
    }
    public function updatetype(Request $request)
    {

        if ($request->type == 'page') {
            $type = 'article';
        }else{
            $type = 'page';
        };
        KategoriM::where('id', $request->id)
        ->where('slug', $request->slug)
        ->update(['type' => $type]);

        return redirect()->route('kategorimenu.index')->with('success', 'Update Menu Status was successful!');
    }
}
