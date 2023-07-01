<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $suratmasuk = SuratMasuk::count();
        $suratkeluar = SuratKeluar::count();

        return view('admin.dashboard.index' , compact('suratmasuk', 'suratkeluar'));
    }
}
