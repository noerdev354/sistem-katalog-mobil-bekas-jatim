<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Iklan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IklanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Iklan::get();

        return view('page-admin.iklan.index', compact('datas'));
    }

    public function create(Request $request)
    {
        //Handling gambar iklan
        if($request->gambar) {
            $validator = Validator::make($request->all(), [
                'gambar' => 'required|max:10240',
            ]);

            if ($validator->fails()) {
                toast('Gagal, Gambar iklan harus maksimal size 10MB','error');

                return back();
            }
        }

        if($request->id_iklan == null) {
            $data = new Iklan();
            $data->created_at = Carbon::now();

            $action = "menambahkan";
        } else {
            $data = Iklan::findOrFail($request->id_iklan);

            $action = "memperbarui";
        }

        if($request->gambar){
            if($data->gambar != null) {
                $gambarIklan = "assets/data-katalog/image/iklan/".$data->gambar;

                if (file_exists($gambarIklan)) {
                    @unlink($gambarIklan);
                }
            }

            $file       = $request->file('gambar');
            $dateTime   = Carbon::now();
            $extension  = $file->getClientOriginalExtension();
            $namaFile   = rand(11111,99999).'-'.$dateTime->format('Y-m-d-H-i-s').'.'.$extension;
            $request->file('gambar')->move("assets/data-katalog/image/iklan/", $namaFile);

            $data->gambar  = $namaFile;
        }

        $data->judul        = $request->judul;
        $data->keterangan   = $request->keterangan;
        $data->updated_at = Carbon::now();
        $data->save();

        toast("Berhasil ".$action." ".$request->judul,'success');
        return back();
    }

    public function destroy($id)
    {
        $data = Iklan::findOrFail($id);

        if($data->gambar != null) {
            $gambarIklan = "assets/data-katalog/image/iklan/".$data->gambar;

            if (file_exists($gambarIklan)) {
                @unlink($gambarIklan);
            }
        }

        $data->delete();

        toast("Berhasil menghapus Iklan ".$data->judul, 'success');
        return back();
    }
}
