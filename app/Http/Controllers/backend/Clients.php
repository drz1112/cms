<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ClientsM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class Clients extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = ClientsM::select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('clients_description', function ($row) {
                return Str::limit($row->clients_description, 50);
            })
            ->editColumn('clients_name', function ($row) {
                return Str::limit($row->clients_name, 30);
            })
            ->addColumn('updated_at', function($row) {
                return $row->updated_at->diffForHumans();
            })
            ->editColumn('clients_logos', function($row) {
                $logo = '
                <div class="input-group">
                    <button id="btnimgpreview" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    <i class="fas fa-fw fa-eye"></i> Logo
                    </button>
                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Preview Image Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                            </div>
                            <div class="modal-body" style="background-color: lightgray;">
                                <div class="row">
                                <img class="img-preview img-fluid " src="'.asset('/'.$row->clients_logos).'">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>';
                return $logo;
            })
            ->editColumn('clients_link', function($row) {
                $link_client = '<a href="'.$row->clients_link.'" target="_blank"  type="button" class="btn btn-info">
                    <i class="fas fa-link"></i> link
                    </a>';
                return $link_client;
            })
            ->editColumn('clients_status', function($row){
                if ($row->clients_status == '1') {
                    $pub = '<form action="'.route('settingclients.updatestat',[$row->id]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm text-white"
                        onclick="return confirm(\'Apakah anda yakin sembunyikan logo client?\')"><i class="fa fa-unlock"></i></button>
                        </div>
                    </form>';
                } else {
                    $pub = '<form action="'.route('settingclients.updatestat',[$row->id]).'" method="POST">
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
                $act = '<form action="'.route('settingclients.edit',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("get").'
                
                <button type="submit" class="btn btn-success btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>
                
                </form> 
                <form action="'.route('settingclients.destroy',[$row->id]).'" method="POST" style="display: contents">
                '.csrf_field().'
                '.method_field("delete").'
                
                <button type="submit" class="btn btn-danger btn-sm text-white rounded-circle"
                    onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>
                
                </form>';

                return $act;
            })
            ->rawColumns(['clients_status','clients_logos','clients_link','action','updated_at'])
            ->make(true);
        }
        $data = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/clients.home', $data);
    }
    public function add(Request $request){
    }
    public function store(Request $request){
    }
    public function edit(Request $request){
        $data = [
            'settingweb' => SettingWebsiteM::first(),
            'post_clients' => ClientsM::where('id', $request->id)->first()
        ];
        return view('backend/page/clients.edit', $data);
    }
    public function update(Request $request){
        // dd($request->all());
        $check = ClientsM::first();
        $request->validate([
            'clients_status' => 'required|in:0,1',
            'clients_name' => 'required|max:255',
            'clients_link' => 'required|max:255',
            'clients_description' => 'required',
            'clients_logos' => 'image|mimes:png,jpeg,jpg,webp|max:2048|dimensions:min-width=450,min-height=70',
        ]);
        if($request->hasFile('clients_logos')) {
            if ($check->site_Image_dashboard) {
                $image_path = public_path("\\") .$check->site_Image_dashboard;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $originName = $request->file('clients_logos')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('clients_logos')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('clients_logos')->move(public_path('img/clients'), $fileName);
            $url_clients_logos = ('img/clients/'.$fileName);
           
        }else{
            $url_clients_logos = $check->clients_logos;
        }

        $inputdata = [
            'clients_status' => $request->clients_status,
            'clients_name' => $request->clients_name,
            'clients_link' => $request->clients_link,
            'clients_description' => $request->clients_description,
            'clients_logos' => $url_clients_logos,

        ];
        ClientsM::first()->update($inputdata);
        return redirect()->route('settingclients.index')->with('success', 'Update was successful!');
    }
    public function updatestat(Request $request){
        $cek = ClientsM::where('id', $request->id)->first();
        if ($cek->clients_status == '1') {
            $editdata=['clients_status' => '0'];
        } else {
            $editdata=['clients_status' => '1'];
        }
        ClientsM::where('id', $request->id)->update($editdata);
        return redirect()->route('settingclients.index')->with('success', 'Edit Client Status was successful!');
       
    }
    public function destroy(){
    }
}
