<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanamanKategori extends Model
{
    protected $table = "tanaman_kategori";
    protected $primaryKey = 'id_kategori';

    public function detail()
    {
        return $this->hasMany(TanamanDetail::class, 'id_tanaman');
    }
}
