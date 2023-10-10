<?php

namespace App\Models\siswa;

use App\Models\admin\MataPelajaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiRapor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
}
