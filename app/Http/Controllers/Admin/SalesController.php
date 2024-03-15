<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Sales::get();

        return view('page-admin.sales.index', compact('datas'));
    }

    public function create(Request $request)
    {
        if($request->id_sales != null || $request->id_sales != '') {
            $data = Sales::findOrFail($request->id_sales);

            $action = "memperbarui";
        } else {
            $data = new Sales();
            $data->created_at = Carbon::now();

            $action = "menambahkan";
        }

        if($request->foto){
            //Handling foto sales
            $validator = Validator::make($request->all(), [
                'foto' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
            ]);

            if ($validator->fails()) {
                toast('Gagal, Foto sales harus format JPG, JPEG, PNG dan maksimal size 10MB','error');

                return back();
            }

            if($data->foto != null) {
                $fotoSales = "assets/data-katalog/image/sales/".$data->foto;

                if (file_exists($fotoSales)) {
                    @unlink($fotoSales);
                }
            }

            $file       = $request->file('foto');
            $dateTime   = Carbon::now();
            $extension  = $file->getClientOriginalExtension();
            $namaFile   = rand(11111,99999).'-'.$dateTime->format('Y-m-d-H-i-s').'.'.$extension;
            $request->file('foto')->move("assets/data-katalog/image/sales/", $namaFile);

            $data->foto  = $namaFile;
        }

        $data->nama         = $request->nama;
        $data->no_telp      = $request->no_telp;
        $data->updated_at   = Carbon::now();
        $data->save();

        toast("Berhasil ".$action." ".$request->nama,'success');
        return back();
    }

    public function destroy($id)
    {
        $data = Sales::findOrFail($id);

        if($data->foto != null) {
            $fotoSales = "assets/data-katalog/image/sales/".$data->foto;

            if (file_exists($fotoSales)) {
                @unlink($fotoSales);
            }
        }

        $data->delete();

        toast("Berhasil menghapus Sales ".$data->nama, 'success');
        return back();
    }
}
