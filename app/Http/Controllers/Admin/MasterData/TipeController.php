<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Admin\Katalog;
use App\Models\Admin\MasterData\Merk;
use App\Models\Admin\MasterData\Tipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas      = Tipe::get();
        $dataMerks  = Merk::get();

        return view('page-admin.master-data.tipe.index', compact('datas'));
    }

    public function create(Request $request)
    {
        $action = "menambahkan";

        if($request->id_tipe == null) {
            $data = new Tipe();
            $data->created_at = Carbon::now();

            $message = "Berhasil menambahkan Tipe ".$request->nama_tipe;
        } else {
            $data = Tipe::findOrFail($request->id_tipe);
            $action = "memperbarui";

            if($data->nama_tipe === $request->nama_tipe) {
                $message = "Berhasil memperbarui Tipe ".$request->nama_tipe;
            } else {
                $message = "Berhasil memperbarui Tipe dari ".$data->nama_tipe." ke ".$request->nama_tipe;
            }
        }

        $check = Tipe::where('nama_tipe', 'LIKE', rtrim($request->nama_tipe, " "))->count();

        //handling jika sudah ada
        if($check > 0) {
            toast("Gagal ".$action." Tipe ".$request->nama_tipe." karena sudah ada", 'error');
            return back();
        }

        $data->nama_tipe    = $request->nama_tipe;
        $data->updated_at   = Carbon::now();
        $data->save();

        toast($message,'success');
        return back();
    }

    public function destroy($id)
    {
        $data = Tipe::findOrFail($id);
        $data->delete();

        toast("Berhasil menghapus Tipe ".$data->nama_tipe, 'success');
        return back();
    }
}
