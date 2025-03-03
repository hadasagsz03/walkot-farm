<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanamanDetail extends Model
{
    protected $table = "tanaman_detail";
    protected $primaryKey = 'id_tanaman';

    public function kategori()
    {
        return $this->belongsTo(TanamanKategori::class, 'id_kategori');
    }
}
