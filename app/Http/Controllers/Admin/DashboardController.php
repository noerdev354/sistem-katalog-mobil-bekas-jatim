<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Iklan;
use App\Models\Admin\Katalog;
use App\Models\Admin\Sales;
use App\Models\User\Pesan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jmlhKatalog    = Katalog::get();
        $jmlhSales      = Sales::get();
        $jmlhIklan      = Iklan::get();
        $jmlhPesan      = Pesan::get();

        $data = [
            'jumlahKatalog' => count($jmlhKatalog),
            'jumlahSales' => count($jmlhSales),
            'jumlahIklan' => count($jmlhIklan),
            'jumlahPesan' => count($jmlhPesan)
        ];

        return view('page-admin.dashboard.index', compact('data'));
    }
}
