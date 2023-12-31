<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotRapor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rpr_alt()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
}
