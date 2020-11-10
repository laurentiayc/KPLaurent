<?php
namespace App\Http\Controllers\AuthCu;

use App\Http\Controllers\Controller;
use DB;
use App\Cu;
use App\AnggotaCu;
use App\AnggotaCuCu;
use App\UserCu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SEO;

class LoginController extends Controller
{
    public function login()
    {
        $subdomain = Route::input('cu');
        
        // $title = "Login";
        // $subtitle = 'Silahkan ' . $title;

        $logins = AnggotaCu::select('no_ba.anggota_cu_cu','tanggal_lahir.anggota_cu')
        ->join('no_ba', 'no_ba.anggota_cu_cu_id', '=', 'anggota_cu_cu.id')
        ->join('tanggal_lahir', 'tanggal_lahir.anggota_cu_id', '=', 'anggota_cu.id');
        //dd($logins);
        
        // seo
        // SEO::setTitle($title . ' - CU ');
        // SEO::setDescription($subtitle);
        // SEO::opengraph()->setUrl(url()->full());

        return view('cu.login', compact('logins'));
    }

    public function validationRequest(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $subdomain = array_first(explode('.', request()->getHost()));
        $userDomainId =  AnggotaCuCu::where('no_ba', $username)->first()->cu_id;
        $userDomain = Cu::where('id', $userDomainId)->first()->slug;

        if($userDomain != $subdomain){
            return redirect('/login')->with(['error' => 'Bukan Wilayah Anda!']);
        }

        $dataUsername = UserCu::where('username', $username)->first();
        if($dataUsername == null){
            $dataUsernameBaru = AnggotaCuCu::where('no_ba', $username)->first()->anggota_cu_id;
            $password = strtotime($password);
            $password = date('Y-m-d', $password);
            $dataPasswordBaru = AnggotaCu::where('tanggal_lahir', $password)
                                    ->first()->id;
            if($dataPasswordBaru == $dataUsernameBaru){
                UserCu::insert([
                    'username' => $username,
                    'password' => $password,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                session(['berhasil_login' => true, 'username' => $username, 'user_baru' => true]);
                return redirect('/updatePassword');
            }else{
                return redirect('/login')->with(['error' => 'Username atau Password Salah!']);
            }
        }else{
            $dataUsernameTmp = UserCu::where('username', $username)->first()->username;
            $dataPassword = UserCu::where('password', $password)->first();
            //dd($dataPassword);
            if($dataPassword !=null){
                session(['berhasil_login' => true, 'username' => $username, 'user_lama' => false]);
                return redirect('/loginSuccess');
            }else{
                return redirect('/login')->with(['error' => 'Username atau Password Salah!']);
            }
        }
        
        return redirect('/login')->with(['error' => 'Username atau Password Salah!']);
    }

    public function updatePassword(){
        $subdomain = Route::input('cu');
        return view('cu.updatePassword');
    }

    public function updatePasswordSuccess(Request $request){
        if($request->get('passwordBaru') == $request->get('konfirmasiPassword')){
            UserCu::where('username', $request->session()->get('username'))
            ->update([
                'password' => $request->get('passwordBaru'),
            ]);
            return redirect('/profileAnggota');
        }else{
            return redirect('/updatePassword')->with(['error' => 'Password Tidak Sama!']);
        }  
    }

    public function success()
    {
        $subdomain = Route::input('cu');

        // $title = "Selamat Datang";
        // $subtitle = 'Silahkan ' . $title;
        
        // seo
        // SEO::setTitle($title . ' - CU ' . $cu->name);
        // SEO::setDescription($subtitle);
        // SEO::opengraph()->setUrl(url()->full());

        return view('cu.dashboardCu', compact('title','subtitle'));
    }

    public function dashboardCu()
    {
        $subdomain = Route::input('cu');
        
        $cu = Cu::with('provinces')->withCount('hasTp')->where('slug',$subdomain)->first();
        
        if(!$cu){
            abort(404);
        }

        return view('cu.dashboardCu');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}