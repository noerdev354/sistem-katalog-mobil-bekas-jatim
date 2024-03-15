<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Pesan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PesanController extends Controller
{
    public function index()
    {
        $this->middleware('auth');

        $datas = Pesan::get();

        return view('page-admin.pesan.index', compact('datas'));
    }

    public function create(Request $request)
    {
        $data = new Pesan();
        $data->nama         = $request->nama;
        $data->no_telp      = $request->no_telp;
        $data->email        = $request->email;
        $data->pesan        = $request->pesan;
        $data->created_at   = Carbon::now();
        $data->updated_at   = Carbon::now();
        $data->save();

        toast("Berhasil mengirim pesan ke Admin Mobil 88 dengan nama ".$request->nama, 'success');
        return Redirect::to('/');
    }

    public function destroy($id)
    {
        $this->middleware('auth');

        $data = Pesan::findOrFail($id);
        $data->delete();

        toast("Berhasil menghapus pesan dari ".$data->nama, 'success');
        return back();
    }
}
