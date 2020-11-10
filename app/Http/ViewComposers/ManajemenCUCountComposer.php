<?php

namespace App\Http\ViewComposers;

use App\Aktivis;
use App\Cu;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ManajemenCUCountComposer
{
    public function compose(View $view)
    {
        $tipe = 1;
        
        $subdomain = Route::input('cu'); 
        $cu = Cu::where('slug',$subdomain)->first();
        $id = $cu->id;  

        $manajemenCUCount = Aktivis::with('pekerjaan_aktif.cu')->whereHas('pekerjaan',function($query) use ($tipe, $id){
            $query->where('tipe',$tipe)->where('id_tempat',$id)->whereIn('tingkat',[5,6,7,8,9])->where('status',1);
        })->count();

        $view->with('manajemenCUCount', $manajemenCUCount);
    }
}