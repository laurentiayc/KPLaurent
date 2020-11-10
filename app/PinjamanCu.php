<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class PinjamanCu extends Model
{
    protected $table = 'pinjaman_cu';

    protected $fillable = [
        'no_ba',
        'jumlah_pinjaman',
        'lama_pinjaman',
        'bunga_pinjaman',
        'angsuran_pinjaman'
    ];
}
