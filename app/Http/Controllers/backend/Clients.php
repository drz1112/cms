<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ClientsM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
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
            ->addColumn('public', function($row){
                if ($row->client_status == '1') {
                    $pub = '<form action="'.route('settingclients.updateprotect',[$row->id]).'" method="POST">
                    '.csrf_field().'
                    '.method_field("PUT").'
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm text-white"
                        onclick="return confirm(\'Apakah anda yakin untuk protect halaman ini?\')"><i class="fa fa-unlock"></i></button>
                        </div>
                    </form>';
                } else {
                    $pub = '<form action="'.route('settingclients.updateprotect',[$row->id]).'" method="POST">
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
            ->rawColumns(['public','action','updated_at'])
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
    }
    public function update(Request $request){
    }
    public function updateprotect(Request $request){
    }
    public function updatestat(Request $request){
    }
    public function destroy(){
    }
}
