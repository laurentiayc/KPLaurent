<?php
namespace App\Http\Controllers\DataAnggota;
use App\Http\Controllers\Controller;
use DB;
use App\Cu;
use App\AnggotaCu;
use App\AnggotaCuCu;
use App\Suku;
use App\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SEO;

class ProfileAnggotaController extends Controller
{
    public function profileAnggota(Request $req){
        $subdomain = Route::input('cu');
        $cu = Cu::with('provinces')->withCount('hasTp')->where('slug',$subdomain)->first();
        
        if(!$cu){
            abort(404);
        }

        $title = 'Edit Profile';
        $subtitle = 'Silahkan perbaharui data diri anda';

        // seo
        SEO::setTitle($title . ' - CU ' . $cu->name);
        SEO::setDescription($subtitle);
        SEO::opengraph()->setUrl(url()->full());

        $sessionUser = session('username');
        
        //dd($sessionUser);
        $profileAnggotas = DB::table('anggota_cu_cu')
                            ->join('anggota_cu', 'anggota_cu_cu.anggota_cu_id', '=', 'anggota_cu.id')
                            ->where('no_ba', $sessionUser)
                            ->get();
        
        $cus = DB::table('anggota_cu_cu')
                ->join('cu', 'anggota_cu_cu.cu_id', '=', 'cu.id')
                ->where('anggota_cu_cu.no_ba', $sessionUser)
                ->get();

        $sukus = Suku::get();
        $pekerjaans = Pekerjaan::get();

        return view('cu.profileAnggota', compact('title','subtitle', 'profileAnggotas', 'cus', 'sukus', 'pekerjaans'));
    }

    public function editProfile(Request $request){
        $no_ba = session('username');
        $idAnggota = AnggotaCuCu::where('no_ba', $no_ba)->first()->anggota_cu_id;
        AnggotaCu::where('id', $idAnggota)
                ->update([
                    'nik' => $request->get('nik'),
                    'npwp' => $request->get('npwp'),
                    'name' => $request->get('name'),
                    'tempat_lahir' => $request->get('tempat_lahir'),
                    'tanggal_lahir' => $request->get('tanggal_lahir'),
                    'kelamin' => $request->get('kelamin'),
                    'agama' => $request->get('agama'),
                    'status' => $request->get('status'),
                    'status_jalinan' => $request->get('status_jalinan'),
                    'alamat' => $request->get('alamat'),
                    'kontak' => $request->get('kontak'),
                    'darah' => $request->get('darah'),
                    'tinggi' => $request->get('tinggi'),
                    'email' => $request->get('email'),
                    'hp' => $request->get('hp'),
                    'pendidikan' => $request->get('pendidikan'),
                    'organisasi' => $request->get('organisasi'),
                    'lembaga' => $request->get('lembaga'),
                    'ahli_waris' => $request->get('ahli_waris'),
                    'rt' => $request->get('rt'),
                    'rw' => $request->get('rw'),
                    'kk' => $request->get('kk'),
                    'nama_ibu' => $request->get('nama_ibu'),
                    'pekerjaan' => $request->get('pekerjaan'),
                    'suku' => $request->get('suku'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        return redirect()->back()->with('success', 'Data Berhasil Diupdate');
        // $subdomain = Route::input('cu');
        // $cu = Cu::with('provinces')->withCount('hasTp')->where('slug',$subdomain)->first();
        
        // $profileAnggotas = $req->input('no_ba');
        // $profileAnggotas = $req->input('nik');
        // $profileAnggotas = $req->input('npwp');
        // $profileAnggotas = $req->input('name');
        // $profileAnggotas = $req->input('tempat_lahir');
        // $profileAnggotas = $req->input('tanggal_lahir');
        // $profileAnggotas = $req->input('kelamin');
        // $profileAnggotas = $req->input('agama');
        // $profileAnggotas = $req->input('status');
        // $profileAnggotas = $req->input('status_jalinan');
        // $profileAnggotas = $req->input('alamat');
        // $profileAnggotas = $req->input('kontak');
        // $profileAnggotas = $req->input('darah');
        // $profileAnggotas = $req->input('tinggi');
        // $profileAnggotas = $req->input('email');
        // $profileAnggotas = $req->input('hp');
        // $profileAnggotas = $req->input('pendidikan');
        // $profileAnggotas = $req->input('jabatan');
        // $profileAnggotas = $req->input('organisasi');
        // $profileAnggotas = $req->input('lembaga');
        // $profileAnggotas = $req->input('penghasilan');
        // $profileAnggotas = $req->input('pengeluaran');
        // $profileAnggotas = $req->input('ahli_waris');
        // $profileAnggotas = $req->input('rt');
        // $profileAnggotas = $req->input('rw');
        // $profileAnggotas = $req->input('kk');
        // $profileAnggotas = $req->input('nama_ibu');
        // $profileAnggotas = $req->input('pekerjaan');
        // $profileAnggotas = $req->input('suku');
        // $profileAnggotas = $req->input('kontak_ahli_waris');
        // $profileAnggotas ->save();

        // return view('cu.profileAnggota', compact('profileAnggotas'));
    }
}