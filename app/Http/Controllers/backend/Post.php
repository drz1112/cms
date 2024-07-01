<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\PostsM;
use App\Models\backend\SettingWebsiteM;
use App\Models\KategoriM;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Post extends Controller
{
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PostsM::class, 'post_slug', $request->pt);
        return response()->json(['post_slug' => $slug]);
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PostsM::with('postingan')->select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('post_excerpt', function ($row) {
                return Str::limit($row->post_excerpt, 50);
            })
            ->editColumn('post_title', function ($row) {
                return Str::limit($row->post_title, 30);
            })
            ->addColumn('updated_at', function($row) {
                return $row->updated_at->diffForHumans();
            })
            ->addColumn('visible', function($row){
                if ($row->post_status == '1') {
                    $visible = '<form action="'.route('posting.updatestat',[$row->id, $row->post_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <button type="submit" class="btn btn-dark btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk tidak menampilkan halaman ini?\')"><i class="fa fa-eye"></i></button>
                    </form>';
                } else {
                    $visible = '<form action="'.route('posting.updatestat',[$row->id, $row->post_slug]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk menampilkan halaman ini\')"><i class="fa fa-eye-slash"></i></button>
                    </form>';
                }
                return $visible;
            })
            ->addColumn('action', function($row){
                $act = '<form action="'.route('posting.edit',[$row->id, $row->post_slug]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("get").'
                <button type="submit" class="btn btn-success btn-sm text-white"
                    onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>
                </form> 
                <form action="'.route('posting.destroy',[$row->id, $row->post_slug]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("delete").'
                <button type="submit" class="btn btn-danger btn-sm text-white"
                    onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>
                </form>';

                return $act;
            })
            ->rawColumns(['visible','action','updated_at'])
            ->make(true);
        }
        $data2 = ['post_website' => SettingWebsiteM::first()];
        return view('backend/page/post.home', $data2);
    }
    public function add(Request $request)
    {
        $data = [
            'category' => KategoriM::where('type', 'article')->get(),
            'post_website' => SettingWebsiteM::first()
        ];
        return view('backend/page/post.add', $data);
    }
    public function store(Request $request)
    {
        $validates = $request->validate([
            'post_title' => 'required|unique:post',
            'post_slug' => 'required|unique:post',
            'categories' => [
                'required',
                Rule::exists('kategori', 'id')->where(function ($query) {
                    $query->where('type', 'article');
                }),
            ],
            'post_content' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min_width=500,min_height=500',
            // 'post_excerpt' => 'required',
            'post_status' => 'required|in:0,1',
        ]);
        $excerpts = Str::limit(strip_tags($request->post_content), 150);
        if ($request->hasFile('thumbnail')) {
            $originName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('thumbnail')->move(public_path('thumbnail'), $fileName);
            $url_thumbnail = ('thumbnail/' . $fileName);
        }
        PostsM::create(
            [
                'post_author' => auth()->user()->id,
                'post_title' => $request->post_title,
                'post_slug' => $request->post_slug,
                'post_category_id' => $request->categories,
                'post_content' => $request->post_content,
                'post_excerpt' => $excerpts,
                'post_link' => '',
                'post_status' => $request->post_status,
                'thumbnail' => $url_thumbnail,
            ]
        );
        // delete unused image
        preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->post_content, $out);
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
        // end delete unused image
        return redirect()->route('posting.index')->with('success', 'Add New Post was successful!');
    }
    public function edit(Request $request)
    {
        $post =  PostsM::where('id', $request->id)
            ->where('post_slug', $request->post_slug)
            ->first();
        $category = KategoriM::where('type', 'article')->get();
        $post_website = SettingWebsiteM::first();
        preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $post->post_content, $out);
            for ($i=0; $i < count($out[1]); $i++) { 
                DB::table('fileuploadmanager')->insert([
                    'idAuth' => auth()->user()->id,
                    'file_path' =>  basename($out[1][$i]),
                    'stats' => '0',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }

        return view('backend/page/post.edit', compact('post', 'category', 'post_website'));
    }
    public function update(Request $request)
    {
        $check = PostsM::where('id', $request->id)->first();
        $excerpts = Str::limit(strip_tags($request->post_content), 150);
        $rules = [
            'post_status' => 'required',
            'post_title' => 'required|max:255',
            'post_slug' => 'required|max:255',
            'post_category' => 'required|exists:kategori,id',
            'post_content' => 'required',
            'thumbnail' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min_width=500,min_height=500',
        ];
        $request->validate($rules);
        if ($request->hasFile('thumbnail')) {
            if ($request->old_thumbnail) {
                $image_path = public_path("\\") . $request->old_thumbnail;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('thumbnail')->move(public_path('thumbnail'), $fileName);
            $url_upload_thumbnail = ('thumbnail/' . $fileName);
        } else {
            $url_upload_thumbnail = $request->old_thumbnail;
        }
        if ($check->post_slug != $request->post_slug) {
            // echo 'jika tidak sama';
            $rules2 = [
                'post_slug' => 'required|max:255|unique:post'
            ];
            $request->validate($rules2);
            PostsM::where('id', $request->id)
                ->update([
                    'post_author' => auth()->user()->id,
                    'post_title' => $request->post_title,
                    'post_slug' => $request->post_slug,
                    'post_category_id' => $request->post_category,
                    'post_content' => $request->post_content,
                    'post_excerpt' => $excerpts,
                    'post_link' => '',
                    'post_status' => $request->post_status,
                    'thumbnail' => $url_upload_thumbnail,
                ]);
            // delete unused image
            preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->post_content, $out);
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
            return redirect()->route('posting.index')->with('success', 'Edit Post was successful!');
        } else {
            // echo 'jika sama';
            PostsM::where('id', $request->id)
                ->update([
                    'post_author' => auth()->user()->id,
                    'post_title' => $request->post_title,
                    'post_slug' => $request->post_slug,
                    'post_category_id' => $request->post_category,
                    'post_content' => $request->post_content,
                    'post_excerpt' => $excerpts,
                    'post_link' => '',
                    'post_status' => $request->post_status,
                    'thumbnail' => $url_upload_thumbnail,
                ]);
            // delete unused image
            preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $request->post_content, $out);
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
            return redirect()->route('posting.index')->with('success', 'Edit Post was successful!');
        }
    }
    public function updatestat(Request $request)
    {
        $post = PostsM::where('id', $request->id)->where('post_slug', $request->post_slug)->first();
        if ($post->post_status == 1) {
            $poststatus = '0';
        } else {
            $poststatus = '1';
        }
        PostsM::where('id', $request->id)
            ->where('post_slug', $request->post_slug)
            ->update(['post_status' => $poststatus]);
        return redirect()->route('posting.index')->with('success', 'Update Status Post was successful!');
    }
    public function destroy(Request $request)
    {
        $checkimg = PostsM::find($request->id);
        preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $checkimg->post_content, $out);
        for ($i=0; $i < count($out[1]); $i++) { 
            $image_path = public_path("\uploads\\") .basename($out[1][$i]);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        } 
        PostsM::where([
            ['id', '=', $request->id],
            ['post_slug', '=', $request->post_slug],
        ])->delete();
        return redirect()->route('posting.index')->with('success', 'Delete User was successful!');
    }
}
