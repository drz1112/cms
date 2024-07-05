<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\SettingWebsiteM;
use App\Models\backend\TeamM;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class Team extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = TeamM::select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('team_Jabatan', function ($row) {
                return Str::limit($row->team_Jabatan, 50);
            })
            ->addColumn('updated_at', function($row) {
                return $row->updated_at->diffForHumans();
            })
            ->editColumn('team_Foto', function($row) {
                $logo = '
                <div class="input-group">
                    <button id="btnimgpreview" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter'.$row->id.'">
                    <i class="fas fa-fw fa-eye"></i> Foto
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
                                    <img class="img-preview img-fluid " src="'.asset('/'.$row->team_Foto).'">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                ';
                return $logo;
            })
            ->addColumn('sosial_media', function($row) {
                $sosmed = '
                <a href="'.$row->team_twitter_link.'" target="_blank" class="btn btn-sm mb-1 btn-facebook"><i class="align-middle fab my-1 fa-facebook"></i></a>
                <a href="'.$row->team_facebook_link.'" target="_blank" class="btn btn-sm mb-1 btn-twitter"><i class="align-middle fab my-1 fa-twitter"></i></a>
                <a href="'.$row->team_ig_link.'" target="_blank" class="btn btn-sm mb-1 btn-instagram"><i class="align-middle fab my-1 fa-instagram"></i></a>
                ';
                return $sosmed;
            })
            ->addColumn('action', function($row){
                $act = '<form action="'.route('team.edit',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("get").'
                
                <button type="submit" class="btn btn-success btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>
                
                </form> 
                <form action="'.route('team.destroy',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("delete").'
                
                <button type="submit" class="btn btn-danger btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>
                
                </form>';

                return $act;
            })
            ->rawColumns(['team_Nama','team_Jabatan','team_Foto','sosial_media','action'])
            ->make(true);
        }
        $data2 = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/team.home', $data2);
    }

    public function add(){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/team.add', $data);
    }

    public function store(Request $request){
        $request->validate([
            'team_Nama' => 'required|max:255',
            'team_Foto' => 'required|image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=450',
            'team_Jabatan' => 'required|max:255',
            'team_twitter_link' => 'required|max:255',
            'team_facebook_link' => 'required|max:255',
            'team_ig_link' => 'required|max:255',
            
        ]);
        $originName = $request->file('team_Foto')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('team_Foto')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $request->file('team_Foto')->move(public_path('img/team'), $fileName);
        $url_team_Foto = ('img/team/'.$fileName);
        $inputdata = [
            'team_Nama' => $request->team_Nama,
            'team_Foto' => $url_team_Foto,
            'team_Jabatan' => $request->team_Jabatan,
            'team_twitter_link' => $request->team_twitter_link,
            'team_facebook_link' => $request->team_facebook_link,
            'team_ig_link' => $request->team_ig_link,
        ];
        TeamM::create($inputdata);
        return redirect()->route('team.index')->with('success', 'Save was successful!');
    }
}
