<?php

namespace App\Models\siswa;

use App\Models\admin\KategoriRmib;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilRmib extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ktg()
    {
        return $this->belongsTo(KategoriRmib::class, 'id_kategori');
    }
}
