<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function krt()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
