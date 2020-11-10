<?php
namespace App\Http\Controllers\DataAnggota;
use App\Http\Controllers\Controller;
use DB;
use App\Cu;
use App\AnggotaCu;
use App\AnggotaCuCu;
use App\ProdukCu;
use App\PinjamanCu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use SEO;

class PinjamanAnggotaController extends Controller
{
    public function pinjamanAnggota(Request $req){
        $subdomain = Route::input('cu');
        $cu = Cu::with('provinces')->withCount('hasTp')->where('slug',$subdomain)->first();
        
        if(!$cu){
            abort(404);
        }

        $title = 'Simulasi Pinjaman';
        $subtitle = 'Silahkan melakukan simulasi ppinjaman';

        // seo
        SEO::setTitle($title . ' - CU ' . $cu->name);
        SEO::setDescription($subtitle);
        SEO::opengraph()->setUrl(url()->full());

        $pinjamanAnggotas = PinjamanCu::where('no_ba', session('username'))->get();


        return view('cu.pinjamanAnggota', compact('title', 'subtitle', 'pinjamanAnggotas'));
    }

    public function createPinjaman(Request $request){
        $request->validate([
            'jumlahPinjaman' => 'required|numeric|gt:0',
            'bungaPinjaman' => 'required|numeric|gt:0',
        ]);

        $jumlahPinjaman = $request->jumlahPinjaman;
        $bungaPinjaman = $request->bungaPinjaman;
        $lamaPinjaman = $request->lamaPinjaman;
        $lamaPinjaman = (int)$lamaPinjaman * 12;
        $jenisProduk = $request->jenisProduk;
        $angsuranPinjaman = $jumlahPinjaman * $bungaPinjaman;
        $angsuranPinjaman = $angsuranPinjaman / 100;
        $angsuranPinjaman = $angsuranPinjaman + $jumlahPinjaman;
        $angsuranPinjaman = $angsuranPinjaman / $lamaPinjaman;
        
        PinjamanCu::insert([
            'no_ba' => session('username'),
            'jumlah_pinjaman' => $jumlahPinjaman,
            'lama_pinjaman' => $lamaPinjaman,
            'bunga_pinjaman' => $bungaPinjaman,
            'angsuran_pinjaman' => $angsuranPinjaman,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('success', 'Data Berhasil Diupdate');
    }
}