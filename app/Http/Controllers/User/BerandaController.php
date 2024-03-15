<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Iklan;
use App\Models\Admin\Katalog;
use App\Models\Admin\MasterData\Merk;
use App\Models\Admin\Sales;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $this->setSEO();

        $dataSales      = Sales::latest()->get();
        $dataIklans     = Iklan::latest()->get();
        $dataMerks      = Merk::orderBy('nama_merk', 'ASC')->get();

        if($request->nama != NULL) {
            $dataNama       = explode(" ", $request->nama);
            $dataJmlh       = count($dataNama) - 1;
            $dataIdMerk     = [];
            $dataIdKatalog  = [];

            for($i=0; $i<=$dataJmlh; $i++) {
                $idMerk     = Merk::where('nama_merk', 'LIKE', '%'.$dataNama[$i].'%')->pluck('id_merk')->toArray();
                $dataIdMerk = array_merge($dataIdMerk, $idMerk);
            }

            $idKatalog  = Katalog::whereIn('id_merk', $dataIdMerk)->pluck('id_katalog')->toArray();
            $dataIdKatalog = array_merge($dataIdKatalog, $idKatalog);

            for($i=0; $i<=$dataJmlh; $i++) {
                $idKatalog  = Katalog::where('nama', 'LIKE', '%'.$dataNama[$i].'%')->pluck('id_katalog')->toArray();
                $dataIdKatalog = array_merge($dataIdKatalog, $idKatalog);
            }
        }

        $dataKatalogs = Katalog::with(['getTipe', 'getMerk']);

        if($request->nama != NULL) {
            $dataKatalogs = $dataKatalogs->whereIn('id_katalog', $dataIdKatalog);
        }

        if($request->id_merk != NULL) {
            $dataKatalogs = $dataKatalogs->where('id_merk', $request->id_merk);
        }

        if($request->order_by != NULL) {
            $dataKatalogs = $dataKatalogs->orderBy('harga', $request->order_by);
        }

        $dataKatalogs = $dataKatalogs->latest()->paginate(12)->onEachSide(2);

        if (FacadesRequest::ajax()) {
            $view = view('page-user.katalog.list', compact('dataKatalogs'))->render();
            $pagination = $dataKatalogs->links('page-user.katalog.pagination')->toHtml();
            $totalPages = $dataKatalogs->lastPage();

            return response()->json([
                'view' => $view,
                'pagination' => $pagination,
                'totalPages' => $totalPages,
            ]);
        }

        return view('page-user.index', compact('dataIklans', 'dataSales', 'dataMerks', 'dataKatalogs'));
    }

    public function setSEO()
    {
        SEOMeta::setTitle('Mobil88');
        SEOMeta::setDescription('Temukan berbagai pilihan mobil bekas berkualitas tinggi di Mobil88, Jual Beli Mobil Bekas, dan cari Mobil Bekas di Jawa Timur.');
        SEOMeta::setKeywords(['mobil bekas', 'jual mobil', 'dealer mobil bekas', 'mobil bekas berkualitas', 'jawa timur']);
        SEOMeta::setCanonical('https://mobilbekasjatim.com/');

        OpenGraph::setDescription('Temukan berbagai pilihan mobil bekas berkualitas tinggi di Mobil88, Jual Beli Mobil Bekas, dan cari Mobil Bekas di Jawa Timur.');
        OpenGraph::setTitle('Mobil88');
        OpenGraph::setUrl('https://www.mobil88.astra.co.id/blog/');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Mobil88');
        TwitterCard::setSite('@mobil88Astra');

        JsonLd::setTitle('Home');
        JsonLd::setDescription('Temukan berbagai pilihan mobil bekas berkualitas tinggi di Mobil88, Jual Beli Mobil Bekas, dan cari Mobil Bekas di Jawa Timur.');
        JsonLd::addImage( asset('assets/data-katalog/logo/mobil88-logo-circle.png') );
    }
}
