<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotRmib extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bbt_alt()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
    public function bbt_kategori()
    {
        return $this->belongsTo(KategoriRmib::class, 'id_kategoriRmib');
    }
}
