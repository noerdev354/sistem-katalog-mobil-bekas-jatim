<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Katalog;
use App\Models\Admin\MasterData\Merk;
use App\Models\Admin\MasterData\Tipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas      = Katalog::with(['getMerk', 'getTipe'])->get();
        $dataMerks  = Merk::orderBy('nama_merk', 'ASC')->get();
        $dataTipes  = Tipe::orderBy('nama_tipe', 'ASC')->get();

        return view('page-admin.katalog.index', compact('datas', 'dataMerks', 'dataTipes'));
    }

    public function create(Request $request)
    {
        //Handling foto katalog
        if($request->foto) {
            $validator = Validator::make($request->all(), [
                'foto' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
            ]);

            if ($validator->fails()) {
                toast('Gagal, Foto katalog harus format JPG, JPEG, PNG dan maksimal size 10MB','error');

                return back();
            }
        }

        if($request->id_katalog == null) {
            $data = new Katalog();
            $data->created_at = Carbon::now();

            $action = "menambahkan";
        } else {
            $data = Katalog::findOrFail($request->id_katalog);

            $action = "memperbarui";
        }

        if($request->foto){
            if($data->foto != null) {
                $fotoKatalog = "assets/data-katalog/image/katalog/".$data->foto;

                if (file_exists($fotoKatalog)) {
                    @unlink($fotoKatalog);
                }
            }

            $file       = $request->file('foto');
            $dateTime   = Carbon::now();
            $extension  = $file->getClientOriginalExtension();
            $namaFile   = rand(11111,99999).'-'.$dateTime->format('Y-m-d-H-i-s').'.'.$extension;
            $request->file('foto')->move("assets/data-katalog/image/katalog/", $namaFile);

            $data->foto  = $namaFile;
        }

        $data->nama                 = $request->nama;
        $data->pajak_lima_tahunan   = Carbon::parse($request->pajak_lima_tahunan)->format('Y-m-d');
        $data->pajak_tahunan        = Carbon::parse($request->pajak_tahunan)->format('Y-m-d');
        $data->id_merk              = $request->id_merk;
        $data->id_tipe              = $request->id_tipe;
        $data->harga                = $request->harga;
        $data->dp                   = $request->dp;
        $data->keterangan           = $request->keterangan;

        $namaMobil = str_replace(' ', '-', $request->nama);
        $namaMerk  = Merk::where('id_merk', $request->id_merk)->first()->nama_merk;

        $data->slug                 = strtolower($namaMerk.'-'.$namaMobil);
        $data->updated_at           = Carbon::now();
        $data->save();

        toast("Berhasil ".$action." Katalog",'success');
        return back();
    }

    public function destroy($id)
    {
        $data = Katalog::with('getTipe')->findOrFail($id);

        if($data->foto != null) {
            $fotoKatalog = "assets/data-katalog/image/katalog/".$data->foto;

            if (file_exists($fotoKatalog)) {
                @unlink($fotoKatalog);
            }
        }

        $data->delete();

        toast("Berhasil menghapus Katalog ".$data->getTipe->getMerk->nama_merk." ".$data->getTipe->nama_tipe, 'success');
        return back();
    }
}
