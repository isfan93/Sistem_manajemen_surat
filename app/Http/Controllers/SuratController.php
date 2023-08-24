<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class SuratController extends Controller
{
    public function surat_m(Request $req)
    {
        // cari data
        if($req->has('search')) {
            $surat_m = SuratMasuk::where('judul_srt','LIKE','%'. $req->search . '%')->OrWhere('asal_srt','LIKE','%'. $req->search . '%')->OrWhere('doc','LIKE','%'. $req->search . '%')->paginate(5);
        }elseif($req->start_date || $req->end_date ){
            $s_date = Carbon::parse($req->start_date)->toDateTimeString();
            $end_date = Carbon::parse($req->end_date)->toDateTimeString();
            $surat_m = SuratMasuk::whereBetween('tgl_srt', [$s_date, $end_date])->get();
        } else {
            $surat_m = SuratMasuk::paginate(5);
        }
        
        // nomor otomatis
        $now = Carbon::now();
        $thnBulan = $now->year. $now->month;
        $cek = SuratMasuk::count();
        //NT2021410000001
        if($cek == 0)
        {
            $urut = 1;
            $nomor = "RS".'/'. $thnBulan .'/'. $urut;
        } else {
            $ambil = SuratMasuk::all()->last();
            $urut = (int)substr($ambil->no_srt,-1) + 1;
            $nomor = "RS".'/'. $thnBulan .'/'. $urut;
        }

        return view('suratmasuk', compact('surat_m', 'nomor'));
        // return view('suratmasuk', ['surat_m' => $surat, 'nomor' => $nomor]);
        
    }

    public function tsm(Request $req)
    {
        $this->validate($req, [
            'judul_srt' => 'required',
            'asal_srt' => 'required',
            'no_srt' => 'required',
            'doc' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'tgl_srt' => 'required'
        ]);

        $file = $req->file('doc');
        $nama_file = $file->getClientOriginalName();
        $folder_tujuan = 'surat masuk';
        $file->move($folder_tujuan, $nama_file);

        SuratMasuk::create([
            'judul_srt' => $req->judul_srt,
            'asal_srt' => $req->asal_srt,
            'no_srt' => $req->no_srt,
            'doc' => $nama_file,
            'tgl_srt' => $req->tgl_srt
        ]);
        Alert::success("Data Berhasil disimpan");
        return redirect('/surat_masuk');
    }

    public function update_tsm($id, Request $req)
    {
        $surat = SuratMasuk::find($id);
        if($req->file('doc') == ""){
            $surat->update([
                'judul_srt' => $req->judul_srt,
                'asal_srt' => $req->asal_srt,
                'no_srt' => $req->no_srt,
                'tgl_srt' => $req->tgl_srt
            ]);
            Alert::success('Data berhasil di ubah');
            return redirect('surat_masuk');
        }else {
            $file = $req->file('doc');
            $nama_file = $file->getClientOriginalName();
            $folder_tujuan = 'surat masuk';
            $file->move($folder_tujuan, $nama_file);

            $surat->judul_srt = $req->judul_srt;
            $surat->asal_srt = $req->asal_srt;
            $surat->no_srt = $req->no_srt;
            $surat->tgl_srt = $req->tgl_srt;
            $surat->doc = $nama_file;
            $surat->save();
            Alert::success('Data berhasil di ubah !');
            return redirect('/surat_masuk');
        }
    }

    public function hapus($id)
    {
        $surat = SuratMasuk::find($id);
        File::delete('surat masuk/'.$surat->doc);
        $surat->delete();
        Alert::success('Data Berhasil dihapus');
        return redirect('/surat_masuk');
    }

    public function surat_k(Request $req)
    {

        if($req->has('search')) {
            $surat_k = SuratKeluar::where('judul_srt','LIKE','%'. $req->search . '%')->OrWhere('asal_srt','LIKE','%'. $req->search . '%')->paginate(5);
        }elseif($req->start_date || $req->end_date){
            $s_date = Carbon::parse($req->start_date)->toDateTimeString();
            $end_date = Carbon::parse($req->end_date)->toDateTimeString();
            $surat_k = SuratMasuk::whereBetween('tgl_srt', [$s_date, $end_date])->get();
        }else {
            $surat_k = SuratKeluar::paginate(5);
        }
        
        $now = Carbon::now();
        $thnBulan = $now->year. $now->month;
        $cek = SuratKeluar::count();
        //NT2021410000001
        if($cek == 0)
        {
            $urut = 1;
            $nomor = "RS".'/'. $thnBulan .'/'. $urut;
        } else {
            $ambil = SuratKeluar::all()->last();
            $urut = (int)substr($ambil->no_srt,-1) + 1;
            $nomor = "RS".'/'. $thnBulan .'/'. $urut;
        }
    

        return view('suratkeluar', compact('surat_k', 'nomor'));
        
    }

    public function tsk(Request $req)
    {
        $this->validate($req, [
            'judul_srt' => 'required',
            'asal_srt' => 'required',
            'no_srt' => 'required',
            'doc' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'tgl_srt' => 'required'
        ]);

        $file = $req->file('doc');
        $nama_file = $file->getClientOriginalName();
        $folder_tujuan = 'surat keluar';
        $file->move($folder_tujuan, $nama_file);

        SuratKeluar::create([
            'judul_srt' => $req->judul_srt,
            'asal_srt' => $req->asal_srt,
            'no_srt' => $req->no_srt,
            'doc' => $nama_file,
            'tgl_srt' => $req->tgl_srt
        ]);
        Alert::success("Data Berhasil disimpan");
        return redirect('/surat_keluar');
    }

    public function update_tsk($id, Request $req)
    {
        $surat = SuratKeluar::find($id);
        if($req->file('doc') == ""){
            $surat->update([
                'judul_srt' => $req->judul_srt,
                'asal_srt' => $req->asal_srt,
                'no_srt' => $req->no_srt,
                'tgl_srt' => $req->tgl_srt
            ]);
            Alert::success('Data berhasil di ubah');
            return redirect('surat_keluar');
        }else {
            $file = $req->file('doc');
            $nama_file = $file->getClientOriginalName();
            $folder_tujuan = 'surat keluar';
            $file->move($folder_tujuan, $nama_file);

            $surat->judul_srt = $req->judul_srt;
            $surat->asal_srt = $req->asal_srt;
            $surat->no_srt = $req->no_srt;
            $surat->tgl_srt = $req->tgl_srt;
            $surat->doc = $nama_file;
            $surat->save();
            Alert::success('Data berhasil di ubah !');
            return redirect('/surat_keluar');
        }
    }

    public function hapus_sk($id)
    {
        $surat = SuratKeluar::find($id);
        File::delete('surat keluar/'.$surat->doc);
        $surat->delete();
        Alert::success('Data Berhasil dihapus');
        return redirect('/surat_keluar');
    }

    public function trash_srt_m()
    {
        $surat = SuratMasuk::onlyTrashed()->get();
        return view('trash_surat_m', ['surat' => $surat]);
    }

    public function restore_srt_m($id)
    {
        $surat = SuratMasuk::onlyTrashed()->where('id', $id);
        $surat->restore();
        return redirect('/surat_masuk/trash');
    }

    public function hapus_permanen($id)
    {
        $surat = SuratMasuk::onlyTrashed()->where('id',$id);
        $surat->forceDelete();
        return redirect('/surat_masuk/trash');
    }

    public function sortir_srt_m(Request $req)
    {
        if($req->start_date || $req->end_date ) {
            $s_date = Carbon::parse($req->start_date)->toDateTimeString();
            $end_date = Carbon::parse($req->end_date)->toDateTimeString();
            $surat_m = SuratMasuk::whereBetween('created_at', [$s_date, $end_date])->get();
        }else{
            $surat_m = SuratMasuk::latest()->get();
        }

        return view('suratmasuk', compact('surat_m'));
    }

    public function view_doc()
    {
        // $srt = SuratMasuk::find($id);
        return view('view_doc');
    }

    public function error404($nama)
    {

        return abort(404);
    }


    
}
