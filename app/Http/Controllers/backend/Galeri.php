<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\GaleriM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class Galeri extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = GaleriM::select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('galeri_title', function ($row) {
                return Str::limit($row->galeri_title, 30);
            })
            ->editColumn('galeri_deskripsi_singkat', function ($row) {
                return Str::limit($row->galeri_deskripsi_singkat, 50);
            })
            ->addColumn('updated_at', function($row) {
                return $row->updated_at->diffForHumans();
            })
            ->editColumn('galeri_gambar', function($row) {
                $logo = '
                <div class="input-group">
                    <button id="btnimgpreview" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter'.$row->id.'">
                    <i class="fas fa-fw fa-eye"></i> Logo
                    </button>
                    <div class="modal fade" id="modalCenter'.$row->id.'" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Preview Image Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                                </div>
                                <div class="modal-body" style="background-color: lightgray;">
                                    <div class="row">
                                    <img class="img-preview img-fluid " src="'.asset('/'.$row->galeri_gambar).'">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                ';
                return $logo;
            })
            ->editColumn('galeri_status', function($row){
                if ($row->galeri_status == '1') {
                    $pub = '<form action="'.route('galeri.updatestat',[$row->id]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm text-white"
                        onclick="return confirm(\'Apakah anda yakin sembunyikan logo client?\')"><i class="fa fa-unlock"></i></button>
                        </div>
                    </form>';
                } else {
                    $pub = '<form action="'.route('galeri.updatestat',[$row->id]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah anda yakin untuk menampilkan logo client?\')"><i class="fa fa-lock"></i></button>
                        </div>
                    </form>';
                }
                return $pub;
            })
            ->addColumn('action', function($row){
                $act = '<form action="'.route('galeri.edit',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("get").'
                
                <button type="submit" class="btn btn-success btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>
                
                </form> 
                <form action="'.route('galeri.destroy',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("delete").'
                
                <button type="submit" class="btn btn-danger btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>
                
                </form>';

                return $act;
            })
            ->rawColumns(['galeri_title','galeri_deskripsi_singkat','galeri_gambar','galeri_status','action'])
            ->make(true);
        }
        $data2 = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/galeri.home', $data2);
    }
    public function add(){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/galeri.add', $data);
    }
    public function store(Request $request){
        $request->validate([
            'galeri_status' => 'required|in:0,1',
            'galeri_title' => 'required|max:255',
            'galeri_deskripsi_singkat' => 'required',
            'galeri_gambar' => 'required|image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=450',
        ]);
        $originName = $request->file('galeri_gambar')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('galeri_gambar')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $request->file('galeri_gambar')->move(public_path('img/galeri'), $fileName);
        $url_galeri_gambar = ('img/galeri/'.$fileName);
        $inputdata = [
            'galeri_status' => $request->galeri_status,
            'galeri_title' => $request->galeri_title,
            'galeri_deskripsi_singkat' => $request->galeri_deskripsi_singkat,
            'galeri_gambar' => $url_galeri_gambar,

        ];
        GaleriM::create($inputdata);
        return redirect()->route('galeri.index')->with('success', 'Save was successful!');
    }
    public function updatestat(Request $request){
        $cek = GaleriM::where('id', $request->id)->first();
        if ($cek->galeri_status == '1') {
            $editdata=['galeri_status' => '0'];
        } else {
            $editdata=['galeri_status' => '1'];
        }
        GaleriM::where('id', $request->id)->update($editdata);
        return redirect()->route('galeri.index')->with('success', 'Edit Client Status was successful!');
    }
    public function edit(Request $request){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'post_galeri' => GaleriM::where('id', $request->id)->first()
        ];
        return view('backend/page/galeri.edit', $data);
    }
    public function update(Request $request){
        $check = GaleriM::first();
        $request->validate([
            'galeri_status' => 'required|in:0,1',
            'galeri_title' => 'required|max:255',
            'galeri_deskripsi_singkat' => 'required',
            'galeri_gambar' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=450',
        ]);
        if($request->hasFile('galeri_gambar')) {
            if ($check->galeri_gambar) {
                $image_path = public_path("\\") .$check->galeri_gambar;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('galeri_gambar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('galeri_gambar')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('galeri_gambar')->move(public_path('img/galeri'), $fileName);
            $url_galeri_gambar = ('img/galeri/'.$fileName);
           
        }else{
            $url_galeri_gambar = $check->galeri_gambar;
        }

        $inputdata = [
            'galeri_status' => $request->galeri_status,
            'galeri_title' => $request->galeri_title,
            'galeri_deskripsi_singkat' => $request->galeri_deskripsi_singkat,
            'galeri_gambar' => $url_galeri_gambar,

        ];
        GaleriM::first()->update($inputdata);
        return redirect()->route('galeri.index')->with('success', 'Update was successful!');
    }
    public function destroy(Request $request){
        $galeri = GaleriM::where('id', '=', $request->id);
        $image_path = public_path("\\") .$galeri->first()->galeri_gambar;

        $galeri->delete();
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return redirect()->route('galeri.index')->with('success', 'Delete client was successful!');
    }



}
