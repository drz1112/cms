<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\PagesM;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Pages extends Controller
{
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PagesM::class, 'pages_slug', $request->pt);
        return response()->json(['pages_slug' => $slug]);
    }

    public function upload(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
            'upload' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($validator->fails()) {
            $data['uploaded'] = 0;
            $data['error']['message'] = $validator->errors()->first('upload'); // Error response
        } else {
            if ($request->file('upload')) {
                $file = $request->file('upload');
                $filename = time() . '_' . $file->getClientOriginalName();
                $location = 'uploads';
                $file->move($location, $filename);
                $filepath = url('uploads/' . $filename);
                $data['fileName'] = $filename;
                $data['uploaded'] = 1;
                $data['url'] = $filepath;
                // save to temporary DB
                DB::table('fileuploadmanager')->insert([
                    'idAuth' => auth()->user()->id,
                    'file_path' =>  $filename,
                    'stats' => '0',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                // end
            } else {
                // Response
                $data['uploaded'] = 0;
                $data['error']['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);
    }
    public function destroy(Request $request)
    {
        $checkimg = PagesM::find($request->id);
        preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $checkimg->pages_content, $out);
        for ($i=0; $i < count($out[1]); $i++) { 
            $image_path = public_path("\uploads\\") .basename($out[1][$i]);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }   
        PagesM::where([
            ['id', '=', $request->id],
            ['pages_slug', '=', $request->pages_slug],
        ])->delete();

        return redirect()->route('pages.index')->with('success', 'Delete Pages was successful!');
    }
    public function updatestat(Request $request)
    {
        $pages =PagesM::where('id', $request->id)->where('pages_slug', $request->pages_slug)->first();
        if ($pages->pages_status == 1) {
            $pagestypes = '0';  
        } else {
            $pagestypes = '1';
        }
        PagesM::where('id', $request->id)
                ->where('pages_slug', $request->pages_slug)
                ->update(['pages_status' => $pagestypes ]);

        return redirect()->route('pages.index')->with('success', 'Update Status Pages was successful!');
    }
    public function updateprotect(Request $request)
    {
        $pages =PagesM::where('id', $request->id)->where('pages_slug', $request->pages_slug)->first();
        if ($pages->pages_protect == 1) {
            $pagestypes = '2';  
        } else {
            $pagestypes = '1';
        }
        PagesM::where('id', $request->id)
                ->where('pages_slug', $request->pages_slug)
                ->update(['pages_protect' => $pagestypes ]);

        return redirect()->route('pages.index')->with('success', 'Update Status Pages was successful!');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PagesM::with('postingan')->select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('pages_excerpt', function ($row) {
                return Str::limit($row->pages_excerpt, 50);
            })
            ->editColumn('pages_title', function ($row) {
                return Str::limit($row->pages_title, 30);
            })
            ->addColumn('updated_at', function($row) {
                return $row->updated_at->diffForHumans();
            })
            ->addColumn('public', function($row){
                if ($row->pages_protect == '1') {
                    $pub = '<form action="'.route('pages.updateprotect',[$row->id, $row->pages_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm text-white"
                        onclick="return confirm(\'Apakah anda yakin untuk protect halaman ini?\')"><i class="fa fa-unlock"></i></button>
                        </div>
                    </form>';
                } else {
                    $pub = '<form action="'.route('pages.updateprotect',[$row->id, $row->pages_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk menghapus protect halaman ini?\')"><i class="fa fa-lock"></i></button>
                        </div>
                    </form>';
                }
                return $pub;
            })
            ->addColumn('visible', function($row){
                if ($row->pages_status == '1') {
                    $visible = '<form action="'.route('pages.updatestat',[$row->id, $row->pages_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk tidak menampilkan halaman ini?\')"><i class="fa fa-eye"></i></button>
                    </div>
                    </form>';
                } else {
                    $visible = '<form action="'.route('pages.updatestat',[$row->id, $row->pages_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk menampilkan halaman ini\')"><i class="fa fa-eye-slash"></i></button>
                    </div>
                    </form>';
                }
                return $visible;
            })
            ->addColumn('action', function($row){
                $act = '<form action="'.route('pages.edit',[$row->id, $row->pages_slug]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("get").'
                
                <button type="submit" class="btn btn-success btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>
                
                </form> 
                <form action="'.route('pages.destroy',[$row->id, $row->pages_slug]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("delete").'
                
                <button type="submit" class="btn btn-danger btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>
                
                </form>';

                return $act;
            })
            ->rawColumns(['public','visible','action','updated_at'])
            ->make(true);
        }
        $data = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/pages.home', $data);
    }

    public function add(Request $request)
    {
        $check =  KategoriM::with('Pages')->where('type','page')->whereDoesntHave('Pages')->get();
        if (count($check) === 0) {
            return redirect()->route('pages.index')->with('warning', 'All Pages was Publish or Draft!');
        } else{
            $data = [
                'title_table' => 'Pages New',
                'category' => $check,
                'settingweb' => SettingWebsiteM::first(),
            ];
            return view('backend/page/pages.add', $data);
        }   
    }
    public function store(Request $request)
    {
        $validates = $request->validate([
            'pages_title' => 'required|unique:pages',
            'pages_slug' => 'required|unique:pages',
            'categories' => [
                'required',
                Rule::exists('kategori', 'id')->where(function ($query){
                    $query->where('type', 'page');
                }),
            ],
            'pages_content' => 'required',
            'pages_status' => 'required|in:0,1',
            'pages_protect' => 'required|in:1,2',
        ]);

        $checkidCate = PagesM::where('pages_category_id',$request->categories)->first();
        if($checkidCate){
            return back()->withErrors(["categories" => "Category not found !!! "])->withInput();
        }else{
            $excerpts = Str::limit(strip_tags($request->pages_content), 150);
            PagesM::create(
                [
                    'pages_author' => auth()->user()->id,
                    'pages_title' => $request->pages_title,
                    'pages_slug' => $request->pages_slug,
                    'pages_category_id' => $request->categories,
                    'pages_content' => $request->pages_content,
                    'pages_excerpt' => $excerpts,
                    'pages_link' => '',
                    'pages_protect' => $request->pages_protect,
                    'pages_status' => $request->pages_status,
                ]
            );


            preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->pages_content, $out);
            for ($i=0; $i < count($out[1]); $i++) { 
                DB::table('fileuploadmanager')
                ->where('idAuth', auth()->user()->id)
                ->where('file_path', basename($out[1][$i]))
                ->update([
                    'stats' => '1',
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
            $delImage = DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->where('stats',0)->get();
            foreach ($delImage as $value) {
                $image_path = public_path("\uploads\\") .$value->file_path;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->delete();
            return redirect()->route('pages.index')->with('success', 'Add New Pages was successful!');
        }
        
    }

    public function edit(Request $request)
    {
        $post =  PagesM::where('id', $request->id)
                        ->where('pages_slug', $request->pages_slug)
                        ->first();
        $category = KategoriM::where('type','page')->get();
        $settingweb = SettingWebsiteM::first();        
        preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $post->pages_content, $out);
            for ($i=0; $i < count($out[1]); $i++) { 
                DB::table('fileuploadmanager')->insert([
                    'idAuth' => auth()->user()->id,
                    'file_path' =>  basename($out[1][$i]),
                    'stats' => '0',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
        return view('backend/page/pages.edit', compact('post','category', 'settingweb'));
    }

    public function update(Request $request)
    {
        $check = PagesM::where('id', $request->id)->first();
        $excerpts = Str::limit(strip_tags($request->pages_content), 150);
        $rules = [
            'pages_status' => 'required|in:0,1',
            'pages_title' => 'required|max:255',
            'pages_slug' => 'required|max:255',
            'pages_category' => 'required|exists:kategori,id',
            'pages_content' => 'required',
            'pages_protect' => 'required|in:1,2',
        ];

        $request->validate($rules);
        if ($check->pages_category_id != $request->pages_category) {
            $checkdata = PagesM::where('pages_category_id', $request->pages_category)->first();
            if ($checkdata) {
                return back()->withErrors(["pages_category" => "Category was exist !!! "])->withInput();
            }
        }
        
        $checkCatepages = KategoriM::where('id',$request->pages_category)->where('type','page')->first();
        if (empty($checkCatepages)) {
            return back()->withErrors(["pages_category" => "Category not exist for Pages!!! "])->withInput();
        }

        if ($check->pages_slug != $request->pages_slug) {
            $rules2 = [
                'pages_slug' => 'required|max:255|unique:pages'
            ];
            $request->validate($rules2);
            PagesM::where('id', $request->id)
                    ->update([
                        'pages_author' => auth()->user()->id,
                        'pages_title' => $request->pages_title,
                        'pages_slug' => $request->pages_slug,
                        'pages_category_id' => $request->pages_category,
                        'pages_content' => $request->pages_content,
                        'pages_excerpt' => $excerpts,
                        'pages_link' => '',
                        'pages_status' => $request->pages_status,
                        'pages_protect' => $request->pages_protect,
                        ]);
            preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->pages_content, $out);
            for ($i=0; $i < count($out[1]); $i++) { 
                DB::table('fileuploadmanager')
                ->where('idAuth', auth()->user()->id)
                ->where('file_path', basename($out[1][$i]))
                ->update([
                    'stats' => '1',
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
            $delImage = DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->where('stats',0)->get();
            foreach ($delImage as $value) {
                $image_path = public_path("\uploads\\") .$value->file_path;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->delete();
            return redirect()->route('pages.index')->with('success', 'Edit Pages was successful!');
        }else{
            PagesM::where('id', $request->id)
                    ->update([
                        'pages_author' => auth()->user()->id,
                        'pages_title' => $request->pages_title,
                        'pages_slug' => $request->pages_slug,
                        'pages_category_id' => $request->pages_category,
                        'pages_content' => $request->pages_content,
                        'pages_excerpt' => $excerpts,
                        'pages_link' => '',
                        'pages_status' => $request->pages_status,
                        'pages_protect' => $request->pages_protect,
                        ]);
            preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->pages_content, $out);
            for ($i=0; $i < count($out[1]); $i++) { 
                DB::table('fileuploadmanager')
                ->where('idAuth', auth()->user()->id)
                ->where('file_path', basename($out[1][$i]))
                ->update([
                    'stats' => '1',
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
            $delImage = DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->where('stats',0)->get();
            foreach ($delImage as $value) {
                $image_path = public_path("\uploads\\") .$value->file_path;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            DB::table('fileuploadmanager')->where('idAuth', auth()->user()->id)->delete();
            return redirect()->route('pages.index')->with('success', 'Edit Pages was successful!');
        }
        
        
    }
}
