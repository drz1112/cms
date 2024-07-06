<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\FaqM;
use App\Models\backend\SettingWebsiteM;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class Faq extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FaqM::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('faq_status', function ($row) {
                    if ($row->faq_status == '1') {
                        $pub = '<form action="' . route('faq.updatestat', [$row->id]) . '" method="POST">
                        ' . csrf_field() . '
                        ' . method_field("PUT") . '
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-sm text-white"
                            onclick="return confirm(\'Apakah anda yakin sembunyikan FAQ ini?\')"><i class="fa fa-unlock"></i></button>
                            </div>
                        </form>';
                    } else {
                        $pub = '<form action="' . route('faq.updatestat', [$row->id]) . '" method="POST">
                        ' . csrf_field() . '
                        ' . method_field("PUT") . '
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm(\'Apakah anda yakin untuk menampilkan FAQ ini?\')"><i class="fa fa-lock"></i></button>
                            </div>
                        </form>';
                    }
                    return $pub;
                })
                ->addColumn('action', function ($row) {
                    $act = '<form action="' . route('faq.edit', [$row->id]) . '" method="POST" style="display: contents">
                    ' . csrf_field() . '
                    ' . method_field("get") . '

                    <button type="submit" class="btn btn-success btn-sm text-white rounded-circle"
                        onclick="return confirm(\'Apakah anda yakin untuk mengubah data ini?\')"><i class="fa fa-pencil"></i></button>

                    </form>
                    <form action="' . route('faq.destroy', [$row->id]) . '" method="POST" style="display: contents">
                    ' . csrf_field() . '
                    ' . method_field("delete") . '

                    <button type="submit" class="btn btn-danger btn-sm text-white rounded-circle"
                        onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"><i class="fa fa-trash"></i></button>

                    </form>';

                    return $act;
                })
                ->rawColumns(['faq_status', 'action'])
                ->make(true);
        }
        $data2 = [
            'settingweb' => SettingWebsiteM::first(),
        ];
        return view('backend/page/faq.home', $data2);
    }

    public function updatestat(Request $request)
    {
        $cek = FaqM::where('id', $request->id)->first();
        if ($cek->faq_status == '1') {
            $editdata = ['faq_status' => '0'];
        } else {
            $editdata = ['faq_status' => '1'];
        }
        FaqM::where('id', $request->id)->update($editdata);
        return redirect()->route('faq.index')->with('success', 'Edit FAQ Status was successful!');
    }
}
