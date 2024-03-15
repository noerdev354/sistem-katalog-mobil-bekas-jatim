<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Admin\MasterData\Merk;
use App\Models\Admin\MasterData\Tipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Merk::get();

        return view('page-admin.master-data.merk.index', compact('datas'));
    }

    public function create(Request $request)
    {
        $action = "menambahkan";

        if($request->id_merk == null) {
            $data = new Merk();
            $data->created_at = Carbon::now();

            $message = "Berhasil menambahkan Merk ".$request->nama_merk;
        } else {
            $data = Merk::findOrFail($request->id_merk);
            $action = "memperbarui";
            $message = "Berhasil memperbarui Merk dari ".$data->nama_merk." ke ".$request->nama_merk;
        }

        $check = Merk::where('id_merk', 'NOT LIKE', $data->id_merk)->where('nama_merk', 'LIKE', rtrim($request->nama_merk, " "))->count();

        //handling jika sudah ada
        if($check > 0) {
            toast("Gagal ".$action." Merk ".$request->nama_merk." karena sudah ada", 'error');
            return back();
        }

        $data->nama_merk    = $request->nama_merk;
        $data->updated_at   = Carbon::now();
        $data->save();

        toast($message,'success');
        return back();
    }

    public function destroy($id)
    {
        $data = Merk::findOrFail($id);

        //handling jika merk di pakai
        $check = Tipe::where('id_merk', $id)->count();

        if($check > 0) {
            toast("Gagal menghapus Merk ".$data->nama_merk." karena sedang digunakan", 'error');
            return back();
        } else {
            $data->delete();

            toast("Berhasil menghapus Merk ".$data->nama_merk, 'success');
            return back();
        }
    }
}
