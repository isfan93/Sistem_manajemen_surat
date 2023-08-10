<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class SuratController extends Controller
{
    public function surat_m(Request $req)
    {

        if($req->has('search')) {
            $surat = SuratMasuk::where('judul_srt','LIKE','%'. $req->search . '%')->OrWhere('asal_srt','LIKE','%'. $req->search . '%')->get();
        } else {
            $surat = SuratMasuk::all();
        }
        
        // $sortir = SuratMasuk::where('tgl_srt','='. $req->date1.'')->get();
        return view('suratmasuk', ['surat_m' => $surat]);
        
    }

    public function sortir_surat(Request $req)
    {
       
    }

    public function surat_k()
    {
        return view('suratkeluar');
    }

    // public function view_doc()
    // {
    //     return view('view_doc');
    // }

    public function error404(){
        return view('error404');
    }
}
